<?php

namespace App\Filament\Resources\Publishers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PublishersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->circular(),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('country')
                    ->sortable(),

                TextColumn::make('founded_date')
                    ->date()
                    ->sortable(),

                TextColumn::make('games_count')
                    ->counts('games')
                    ->label('Games')
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'success' => 'active',
                        'warning' => 'inactive',
                        'info' => 'acquired',
                        'danger' => 'closed',
                    ]),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'acquired' => 'Acquired',
                        'closed' => 'Closed',
                    ]),

                SelectFilter::make('country')
                    ->options(fn () =>
                        \App\Models\Publisher::query()
                            ->distinct()
                            ->pluck('country', 'country')
                            ->toArray()
                    ),
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