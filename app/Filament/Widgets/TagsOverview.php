<?php

namespace App\Filament\Widgets;

use App\Models\Tag;
use Filament\Widgets\ChartWidget;

class TagsOverview extends ChartWidget
{
    protected ?string $heading = 'Tags Overview';

    protected function getData(): array
    {

        $tags = Tag::selectRaw('type, COUNT(*) as total')
            ->groupBy('type')
            ->pluck('total', 'type')
            ->toArray();

        

        return [
            'labels' => array_keys($tags),
            'datasets' => [
                [
                    'label' => 'Tags Count',
                    'data' => array_values($tags),
                    'backgroundColor' => '#4ade80',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
