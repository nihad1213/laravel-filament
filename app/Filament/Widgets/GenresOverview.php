<?php

namespace App\Filament\Widgets;

use App\Models\Genre;
use Filament\Widgets\ChartWidget;

class GenresOverview extends ChartWidget
{
    protected ?string $heading = 'Genres Overview';

    protected function getData(): array
    {
        $data = Genre::withCount('games')
            ->having('games_count', '>', 0)
            ->orderByDesc('games_count')
            ->limit(8)
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
        return 'pie';
    }
}