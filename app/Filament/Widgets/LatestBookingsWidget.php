<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\BookingResource;
use App\Models\Booking;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestBookingsWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Latest Bookings';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Booking::query()
                    ->with('room')
                    ->latest()
                    ->limit(8)
            )
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Ref')
                    ->formatStateUsing(fn ($state) => '#' . str_pad($state, 5, '0', STR_PAD_LEFT))
                    ->sortable(),

                Tables\Columns\TextColumn::make('guest_name')
                    ->label('Guest')
                    ->searchable()
                    ->weight('medium'),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('room.name')
                    ->label('Room')
                    ->default('—'),

                Tables\Columns\TextColumn::make('check_in')
                    ->label('Check-in')
                    ->date('d M Y'),

                Tables\Columns\TextColumn::make('check_out')
                    ->label('Check-out')
                    ->date('d M Y'),

                Tables\Columns\TextColumn::make('guests')
                    ->label('Pax')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('total_price')
                    ->label('Total')
                    ->money('USD'),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'confirmed' => 'success',
                        'pending'   => 'warning',
                        'cancelled' => 'danger',
                        'completed' => 'info',
                        default     => 'gray',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Submitted')
                    ->since()
                    ->color('gray'),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (Booking $record): string => BookingResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-m-eye')
                    ->color('gray'),

                Tables\Actions\Action::make('confirm')
                    ->label('Confirm')
                    ->icon('heroicon-m-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (Booking $record) => $record->status === 'pending')
                    ->action(fn (Booking $record) => $record->update(['status' => 'confirmed'])),
            ])
            ->paginated(false);
    }
}
