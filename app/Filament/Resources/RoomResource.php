<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

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

                Forms\Components\Placeholder::make('current_cover_preview')
                    ->label('Current cover image')
                    ->content(fn ($record) => $record?->image_path
                        ? new HtmlString('<img src="' . asset('storage/' . $record->image_path) . '" style="max-height:160px;border-radius:10px;border:1px solid #e5e7eb;">')
                        : new HtmlString('<span style="color:#9ca3af;font-size:13px;">No image set yet.</span>'))
                    ->columnSpanFull()
                    ->visibleOn('edit'),

                Forms\Components\FileUpload::make('image_path')
                    ->label(fn ($record) => $record?->image_path ? 'Replace cover image' : 'Upload cover image')
                    ->helperText('Upload a new image to replace the current one. Leave empty to keep the existing image.')
                    ->image()
                    ->disk('public')
                    ->directory('rooms')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('4:3')
                    ->imageResizeTargetWidth('800')
                    ->imageResizeTargetHeight('600')
                    ->afterStateHydrated(function ($component) {
                        if ($component->getRecord()) {
                            $component->state(null);
                        }
                    })
                    ->columnSpanFull(),

                Forms\Components\Placeholder::make('current_gallery_preview')
                    ->label('Current gallery images')
                    ->content(function ($record) {
                        if (empty($record?->gallery)) {
                            return new HtmlString('<span style="color:#9ca3af;font-size:13px;">No gallery images set yet.</span>');
                        }
                        $imgs = collect($record->gallery)->map(fn ($path) =>
                            '<img src="' . asset('storage/' . $path) . '" style="height:80px;width:100px;object-fit:cover;border-radius:8px;border:1px solid #e5e7eb;">'
                        )->implode('');
                        return new HtmlString('<div style="display:flex;flex-wrap:wrap;gap:8px;">' . $imgs . '</div>');
                    })
                    ->columnSpanFull()
                    ->visibleOn('edit'),

                Forms\Components\FileUpload::make('gallery')
                    ->label(fn ($record) => !empty($record?->gallery) ? 'Add / replace gallery images' : 'Upload gallery images')
                    ->helperText('Upload new images to add to the gallery. Leave empty to keep existing images.')
                    ->image()
                    ->disk('public')
                    ->multiple()
                    ->reorderable()
                    ->directory('rooms/gallery')
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth('1200')
                    ->imageResizeTargetHeight('800')
                    ->afterStateHydrated(function ($component) {
                        if ($component->getRecord()) {
                            $component->state(null);
                        }
                    })
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
