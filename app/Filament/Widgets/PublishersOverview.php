<?php

namespace App\Filament\Widgets;

use App\Models\Publisher;
use Filament\Widgets\ChartWidget;

class PublishersOverview extends ChartWidget
{
    protected ?string $heading = 'Publishers Overview';

    protected function getData(): array
    {
        $data = Publisher::withCount('games')
            ->having('games_count', '>', 0)
            ->orderByDesc('games_count')
            ->limit(6)
            ->get();

        return [
            'datasets' => [
                [
                    'data' => $data->pluck('games_count'),
                ],
            ],
            'labels' => $data->pluck('name'),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}