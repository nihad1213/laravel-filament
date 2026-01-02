<?php

namespace App\Filament\Resources\Designers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DesignerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->columnSpanFull()
                    ->maxLength(1000),

                FileUpload::make('logo')
                    ->image()
                    ->directory('designers/logos')
                    ->imageEditor(),

                DatePicker::make('founded_date')
                    ->label('Founded Date'),

                TextInput::make('country')
                    ->maxLength(100),

                TextInput::make('website')
                    ->url()
                    ->maxLength(255),

                Toggle::make('is_indie')
                    ->label('Indie Studio'),

                TextInput::make('employee_count')
                    ->numeric()
                    ->minValue(1),

                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'closed' => 'Closed',
                    ])
                    ->required(),
            ]);
    }
}