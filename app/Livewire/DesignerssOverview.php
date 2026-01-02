<?php

namespace App\Livewire;

use App\Models\Designer;
use Filament\Widgets\ChartWidget;

class DesignerssOverview extends ChartWidget
{
    protected ?string $heading = 'Designerss Overview';

    protected function getData(): array
    {
        $data = Designer::query()
            ->whereNotNull('founded_date')
            ->selectRaw('YEAR(founded_date) as year, COUNT(*) as total')
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('total', 'year');

        return [
            'datasets' => [
                [
                    'label' => 'Designers Founded',
                    'data' => $data->values(),
                ],
            ],
            'labels' => $data->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}