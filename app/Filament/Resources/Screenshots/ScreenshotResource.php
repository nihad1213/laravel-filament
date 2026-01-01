<?php

namespace App\Filament\Resources\Screenshots;

use App\Filament\Resources\Screenshots\Pages\CreateScreenshot;
use App\Filament\Resources\Screenshots\Pages\EditScreenshot;
use App\Filament\Resources\Screenshots\Pages\ListScreenshots;
use App\Filament\Resources\Screenshots\Schemas\ScreenshotForm;
use App\Filament\Resources\Screenshots\Tables\ScreenshotsTable;
use App\Models\Screenshot;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ScreenshotResource extends Resource
{
    protected static ?string $model = Screenshot::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Screenshot';

    public static function form(Schema $schema): Schema
    {
        return ScreenshotForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ScreenshotsTable::configure($table);
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
            'index' => ListScreenshots::route('/'),
            'create' => CreateScreenshot::route('/create'),
            'edit' => EditScreenshot::route('/{record}/edit'),
        ];
    }
}
