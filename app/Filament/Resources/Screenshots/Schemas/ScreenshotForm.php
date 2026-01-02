<?php

namespace App\Filament\Resources\Screenshots\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ScreenshotForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('game_id')
                    ->label('Game')
                    ->relationship('game', 'title')
                    ->required()
                    ->searchable()
                    ->preload(),

                FileUpload::make('image_path')
                    ->label('Screenshot')
                    ->image()
                    ->required()
                    ->directory('games/screenshots')
                    ->imageEditor(),
            ]);
    }
}