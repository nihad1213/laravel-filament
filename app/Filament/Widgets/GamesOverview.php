<?php

namespace App\Filament\Widgets;

use App\Models\Game;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GamesOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Games', Game::count())
                ->icon('heroicon-o-rectangle-stack'),

            Stat::make('Released Games', Game::where('status', 'released')->count())
                ->icon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Early Access', Game::where('status', 'early_access')->count())
                ->icon('heroicon-o-clock')
                ->color('warning'),
        ];
    }
}