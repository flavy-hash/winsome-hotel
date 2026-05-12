<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'Hotel';
    protected static ?int $navigationSort = 3;

    public static function getNavigationBadge(): ?string
    {
        return (string) Review::where('status', 'pending')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Review details')->schema([
                Forms\Components\Select::make('room_id')
                    ->relationship('room', 'name')
                    ->label('Room')
                    ->nullable(),

                Forms\Components\TextInput::make('guest_name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),

                Forms\Components\Select::make('rating')
                    ->label('Overall rating')
                    ->options([1=>'1 — Poor',2=>'2 — Fair',3=>'3 — Good',4=>'4 — Very good',5=>'5 — Excellent'])
                    ->required(),

                Forms\Components\Select::make('service_rating')
                    ->label('Service rating')
                    ->options([1=>'1',2=>'2',3=>'3',4=>'4',5=>'5'])
                    ->nullable(),

                Forms\Components\Select::make('cleanliness_rating')
                    ->label('Cleanliness rating')
                    ->options([1=>'1',2=>'2',3=>'3',4=>'4',5=>'5'])
                    ->nullable(),

                Forms\Components\Select::make('status')
                    ->options(['pending'=>'Pending','approved'=>'Approved','rejected'=>'Rejected'])
                    ->required(),
            ])->columns(2),

            Forms\Components\Section::make('Content')->schema([
                Forms\Components\TextInput::make('title')->maxLength(160)->columnSpanFull(),
                Forms\Components\Textarea::make('body')->required()->rows(5)->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('guest_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('room.name')->label('Room')->sortable(),
                Tables\Columns\TextColumn::make('rating')
                    ->label('★')
                    ->formatStateUsing(fn($state) => str_repeat('★', $state) . str_repeat('☆', 5 - $state))
                    ->html(),
                Tables\Columns\TextColumn::make('title')->limit(40),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors(['warning' => 'pending', 'success' => 'approved', 'danger' => 'rejected']),
                Tables\Columns\TextColumn::make('created_at')->since()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(['pending'=>'Pending','approved'=>'Approved','rejected'=>'Rejected']),
            ])
            ->actions([
                Tables\Actions\Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn(Review $r) => $r->status !== 'approved')
                    ->action(fn(Review $r) => $r->update(['status' => 'approved'])),

                Tables\Actions\Action::make('reject')
                    ->label('Reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn(Review $r) => $r->status !== 'rejected')
                    ->action(fn(Review $r) => $r->update(['status' => 'rejected'])),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('approve_all')
                        ->label('Approve selected')
                        ->icon('heroicon-o-check-circle')
                        ->action(fn($records) => $records->each->update(['status' => 'approved'])),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit'   => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
