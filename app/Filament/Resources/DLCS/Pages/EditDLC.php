<?php

namespace App\Filament\Resources\DLCS\Pages;

use App\Filament\Resources\DLCS\DLCResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDLC extends EditRecord
{
    protected static string $resource = DLCResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
