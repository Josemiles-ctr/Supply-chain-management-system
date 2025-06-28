<?php

namespace App\Filament\Resources\Ma\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ManufacturerToSupplierResource;

class ListManufacturerToSuppliers extends ListRecords
{
    protected static string $resource = ManufacturerToSupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}