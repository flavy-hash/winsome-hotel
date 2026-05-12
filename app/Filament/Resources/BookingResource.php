<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Mail\BookingConfirmedMail;
use App\Models\Booking;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Illuminate\Support\Facades\Mail;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Hotel';
    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::where('status', 'pending')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Guest Information')->schema([
                Forms\Components\TextInput::make('guest_name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('phone'),
            ])->columns(3),

            Forms\Components\Section::make('Booking Details')->schema([
                Forms\Components\Select::make('room_id')
                    ->label('Room')
                    ->options(Room::pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                Forms\Components\DatePicker::make('check_in')->required(),
                Forms\Components\DatePicker::make('check_out')->required(),
                Forms\Components\TextInput::make('guests')->label('Adults')->numeric()->default(1)->minValue(1),
                Forms\Components\TextInput::make('children')->numeric()->default(0)->minValue(0),

                Forms\Components\TextInput::make('total_price')
                    ->label('Total price ($)')
                    ->numeric()
                    ->prefix('$'),

                Forms\Components\Select::make('status')
                    ->options([
                        'pending'   => 'Pending',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                        'completed' => 'Completed',
                    ])
                    ->default('pending')
                    ->required(),

                Forms\Components\Textarea::make('notes')->columnSpanFull(),
            ])->columns(2),
        ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Infolists\Components\Section::make('Guest')->schema([
                Infolists\Components\TextEntry::make('guest_name'),
                Infolists\Components\TextEntry::make('email'),
                Infolists\Components\TextEntry::make('phone'),
            ])->columns(3),

            Infolists\Components\Section::make('Booking')->schema([
                Infolists\Components\TextEntry::make('room.name')->label('Room'),
                Infolists\Components\TextEntry::make('check_in')->date(),
                Infolists\Components\TextEntry::make('check_out')->date(),
                Infolists\Components\TextEntry::make('guests')->label('Adults'),
                Infolists\Components\TextEntry::make('children'),
                Infolists\Components\TextEntry::make('total_price')->money('USD'),
                Infolists\Components\TextEntry::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'confirmed' => 'success',
                        'pending'   => 'warning',
                        'cancelled' => 'danger',
                        'completed' => 'info',
                        default     => 'gray',
                    }),
                Infolists\Components\TextEntry::make('notes')->columnSpanFull(),
            ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('#')->sortable(),
                Tables\Columns\TextColumn::make('guest_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('room.name')->label('Room')->sortable(),
                Tables\Columns\TextColumn::make('check_in')->date()->sortable(),
                Tables\Columns\TextColumn::make('check_out')->date()->sortable(),
                Tables\Columns\TextColumn::make('guests')->label('Adults'),
                Tables\Columns\TextColumn::make('children'),
                Tables\Columns\TextColumn::make('total_price')->money('USD')->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'confirmed' => 'success',
                        'pending'   => 'warning',
                        'cancelled' => 'danger',
                        'completed' => 'info',
                        default     => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')->label('Submitted')->dateTime()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending'   => 'Pending',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                        'completed' => 'Completed',
                    ]),
                Tables\Filters\SelectFilter::make('room_id')
                    ->label('Room')
                    ->options(Room::pluck('name', 'id')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),

                Tables\Actions\Action::make('confirm')
                    ->label('Confirm')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Confirm this booking?')
                    ->modalDescription('The guest will receive a confirmation email immediately.')
                    ->visible(fn (Booking $record) => $record->status === 'pending')
                    ->action(fn (Booking $record) => $record->update(['status' => 'confirmed'])),

                Tables\Actions\Action::make('cancel')
                    ->label('Cancel')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Cancel this booking?')
                    ->visible(fn (Booking $record) => in_array($record->status, ['pending', 'confirmed']))
                    ->action(function (Booking $record) {
                        $record->update(['status' => 'cancelled']);
                        Notification::make()->title('Booking cancelled')->danger()->send();
                    }),

                Tables\Actions\Action::make('resend_confirmation')
                    ->label('Resend Email')
                    ->icon('heroicon-o-envelope')
                    ->color('info')
                    ->requiresConfirmation()
                    ->modalHeading('Resend confirmation email?')
                    ->modalDescription('This will send the confirmed email to the guest again.')
                    ->visible(fn (Booking $record) => $record->status === 'confirmed')
                    ->action(function (Booking $record) {
                        $record->loadMissing('room');
                        Mail::to($record->email)->send(new BookingConfirmedMail($record));
                        Notification::make()->title('Confirmation email resent')->success()->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'view'   => Pages\ViewBooking::route('/{record}'),
            'edit'   => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
