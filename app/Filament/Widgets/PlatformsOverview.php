<?php

namespace App\Filament\Widgets;

use App\Models\Platform;
use Filament\Widgets\ChartWidget;

class PlatformsOverview extends ChartWidget
{
    protected ?string $heading = 'Platforms Overview';

    protected function getData(): array
    {
        $platforms = Platform::withCount('games')->get();

        return [
            'labels' => $platforms->pluck('name')->toArray(),
            'datasets' => [
                [
                    'label' => 'Number of Games',
                    'data' => $platforms->pluck('games_count')->toArray(),
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
