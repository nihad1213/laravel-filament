<?php

namespace App\Filament\Resources\DLCS\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DLCSTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('parentGame.title')
                    ->label('Game')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('type')
                    ->badge()
                    ->sortable(),

                TextColumn::make('release_date')
                    ->date()
                    ->sortable(),

                TextColumn::make('price')
                    ->money('USD')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('parent_game_id')
                    ->label('Game')
                    ->relationship('parentGame', 'title')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('type')
                    ->options([
                        'story' => 'Story DLC',
                        'expansion' => 'Expansion',
                        'cosmetic' => 'Cosmetic',
                        'season_pass' => 'Season Pass',
                        'other' => 'Other',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}