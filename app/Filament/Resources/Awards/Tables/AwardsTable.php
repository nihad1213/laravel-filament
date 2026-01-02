<?php

namespace App\Filament\Resources\Awards\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AwardsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('organization')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->badge()
                    ->sortable(),

                TextColumn::make('year')
                    ->sortable(),

                TextColumn::make('game.title')
                    ->label('Game')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('game')
                    ->relationship('game', 'title')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('category')
                    ->options(fn () =>
                        \App\Models\Award::query()
                            ->distinct()
                            ->pluck('category', 'category')
                            ->toArray()
                    ),

                SelectFilter::make('year')
                    ->options(fn () =>
                        \App\Models\Award::query()
                            ->distinct()
                            ->orderByDesc('year')
                            ->pluck('year', 'year')
                            ->toArray()
                    ),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}