<?php

namespace App\Filament\Resources\Awards\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AwardForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('organization')
                    ->required()
                    ->maxLength(255),

                TextInput::make('category')
                    ->required()
                    ->maxLength(255),

                TextInput::make('year')
                    ->numeric()
                    ->required()
                    ->minValue(1900)
                    ->maxValue(now()->year),

                Select::make('game_id')
                    ->relationship('game', 'title')
                    ->required()
                    ->searchable()
                    ->preload(),
            ]);
    }
}
