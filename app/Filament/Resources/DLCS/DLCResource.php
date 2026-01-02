<?php

namespace App\Filament\Resources\DLCS;

use App\Filament\Resources\DLCS\Pages\CreateDLC;
use App\Filament\Resources\DLCS\Pages\EditDLC;
use App\Filament\Resources\DLCS\Pages\ListDLCS;
use App\Filament\Resources\DLCS\Schemas\DLCForm;
use App\Filament\Resources\DLCS\Tables\DLCSTable;
use App\Models\DLC;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DLCResource extends Resource
{
    protected static ?string $model = DLC::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentPlus;

    protected static ?string $recordTitleAttribute = 'DLC';

    public static function form(Schema $schema): Schema
    {
        return DLCForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DLCSTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDLCS::route('/'),
            'create' => CreateDLC::route('/create'),
            'edit' => EditDLC::route('/{record}/edit'),
        ];
    }
}
