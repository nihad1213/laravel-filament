<?php

namespace App\Filament\Widgets;

use App\Models\Screenshot;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ScreenshotssOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Screenshots', Screenshot::count())
                ->icon('heroicon-o-photo'),

            Stat::make(
                'Games with Screenshots',
                Screenshot::distinct('game_id')->count('game_id')
            )
                ->icon('heroicon-o-rectangle-stack'),
        ];
    }
}