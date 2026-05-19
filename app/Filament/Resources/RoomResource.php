<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'Hotel';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Room Details')->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('tag')
                    ->placeholder('e.g. Most loved, Honeymoon, For families')
                    ->maxLength(100),

                Forms\Components\Textarea::make('description')
                    ->rows(3)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('size_sqm')
                    ->label('Size (m²)')
                    ->placeholder('e.g. 42 m²'),

                Forms\Components\TextInput::make('bed_type')
                    ->placeholder('e.g. King bed, Two bedrooms'),

                Forms\Components\TextInput::make('max_guests')
                    ->numeric()
                    ->default(2)
                    ->minValue(1),

                Forms\Components\TextInput::make('price_per_night')
                    ->label('Price per night ($)')
                    ->numeric()
                    ->required()
                    ->prefix('$'),

                Forms\Components\TextInput::make('price_per_night_tzs')
                    ->label('Price per night (TZS)')
                    ->numeric()
                    ->prefix('TZS'),

                Forms\Components\Toggle::make('is_available')
                    ->label('Available for booking')
                    ->default(true),
            ])->columns(2),

            Forms\Components\Section::make('Features & Images')->schema([
                Forms\Components\TagsInput::make('features')
                    ->label('Amenities / Features')
                    ->placeholder('Add feature')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('image_path')
                    ->label('Cover image')
                    ->helperText('Main image shown on room cards and the hero of the detail page.')
                    ->image()
                    ->directory('rooms')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('4:3')
                    ->imageResizeTargetWidth('800')
                    ->imageResizeTargetHeight('600')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('gallery')
                    ->label('Gallery images')
                    ->helperText('Upload multiple photos shown in the gallery on the room detail page.')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->directory('rooms/gallery')
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth('1200')
                    ->imageResizeTargetHeight('800')
                    ->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Photo')
                    ->disk('public')
                    ->square(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tag')
                    ->badge()
                    ->color('warning'),

                Tables\Columns\TextColumn::make('price_per_night')
                    ->money('USD')
                    ->sortable(),

                Tables\Columns\TextColumn::make('price_per_night_tzs')
                    ->label('Price (TZS)')
                    ->numeric(decimalPlaces: 0, thousandsSeparator: ',')
                    ->prefix('TZS ')
                    ->sortable(),

                Tables\Columns\TextColumn::make('size_sqm')
                    ->label('Size'),

                Tables\Columns\TextColumn::make('max_guests')
                    ->label('Max guests'),

                Tables\Columns\IconColumn::make('is_available')
                    ->label('Available')
                    ->boolean(),

                Tables\Columns\TextColumn::make('bookings_count')
                    ->label('Bookings')
                    ->counts('bookings')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_available')->label('Availability'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
