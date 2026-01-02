<?php

namespace App\Filament\Resources\Games\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GameForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->columnSpanFull()
                    ->maxLength(3000),

                DatePicker::make('release_date')
                    ->label('Release Date'),

                FileUpload::make('cover_image')
                    ->image()
                    ->directory('games/covers')
                    ->imageEditor(),

                TextInput::make('metacritic_score')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),

                TextInput::make('price')
                    ->numeric()
                    ->prefix('$')
                    ->minValue(0),

                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'released' => 'Released',
                        'early_access' => 'Early Access',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),
            ]);
    }
}