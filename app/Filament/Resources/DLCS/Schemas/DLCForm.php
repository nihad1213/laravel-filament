<?php

namespace App\Filament\Resources\DLCS\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DLCForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('parent_game_id')
                    ->label('Parent Game')
                    ->relationship('parentGame', 'title')
                    ->required()
                    ->searchable()
                    ->preload(),

                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->columnSpanFull()
                    ->maxLength(2000),

                DatePicker::make('release_date')
                    ->label('Release Date'),

                TextInput::make('price')
                    ->numeric()
                    ->prefix('$')
                    ->minValue(0),

                Select::make('type')
                    ->options([
                        'story' => 'Story DLC',
                        'expansion' => 'Expansion',
                        'cosmetic' => 'Cosmetic',
                        'season_pass' => 'Season Pass',
                        'other' => 'Other',
                    ])
                    ->required(),
            ]);
    }
}