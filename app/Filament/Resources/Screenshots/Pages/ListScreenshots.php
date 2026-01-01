<?php

namespace App\Filament\Resources\Screenshots\Pages;

use App\Filament\Resources\Screenshots\ScreenshotResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListScreenshots extends ListRecords
{
    protected static string $resource = ScreenshotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
