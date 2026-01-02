<?php

namespace App\Filament\Widgets;

use App\Models\Award;
use Filament\Widgets\ChartWidget;

class AwardsOverview extends ChartWidget
{
    protected ?string $heading = 'Awards Overview';

    protected function getData(): array
    {
        $awardsPerYear = Award::query()
            ->selectRaw('year, COUNT(*) as total')
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('total', 'year');

        return [
            'datasets' => [
                [
                    'label' => 'Awards Count',
                    'data' => $awardsPerYear->values(),
                ],
            ],
            'labels' => $awardsPerYear->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}