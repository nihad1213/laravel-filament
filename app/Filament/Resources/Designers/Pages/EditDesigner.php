<?php

namespace App\Filament\Resources\Designers\Pages;

use App\Filament\Resources\Designers\DesignerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDesigner extends EditRecord
{
    protected static string $resource = DesignerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
