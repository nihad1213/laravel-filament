<?php

namespace App\Filament\Resources\Publishers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PublisherForm
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
                    ->maxLength(1500),

                FileUpload::make('logo')
                    ->image()
                    ->directory('publishers/logos')
                    ->imageEditor(),

                DatePicker::make('founded_date')
                    ->label('Founded Date'),

                TextInput::make('country')
                    ->maxLength(100),

                TextInput::make('website')
                    ->url()
                    ->maxLength(255),

                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'acquired' => 'Acquired',
                        'closed' => 'Closed',
                    ])
                    ->required(),
            ]);
    }
}