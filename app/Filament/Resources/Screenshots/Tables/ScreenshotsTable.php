<?php

namespace App\Filament\Resources\Screenshots\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ScreenshotsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->square()
                    ->label('Screenshot'),

                TextColumn::make('game.title')
                    ->label('Game')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('game_id')
                    ->label('Game')
                    ->relationship('game', 'title')
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}