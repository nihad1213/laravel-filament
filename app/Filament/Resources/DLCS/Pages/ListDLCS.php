<?php

namespace App\Filament\Resources\DLCS\Pages;

use App\Filament\Resources\DLCS\DLCResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDLCS extends ListRecords
{
    protected static string $resource = DLCResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
