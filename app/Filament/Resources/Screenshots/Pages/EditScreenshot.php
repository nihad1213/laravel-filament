<?php

namespace App\Filament\Resources\Screenshots\Pages;

use App\Filament\Resources\Screenshots\ScreenshotResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditScreenshot extends EditRecord
{
    protected static string $resource = ScreenshotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
