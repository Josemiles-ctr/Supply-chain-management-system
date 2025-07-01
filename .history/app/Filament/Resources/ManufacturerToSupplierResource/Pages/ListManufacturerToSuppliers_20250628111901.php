<?php

namespace App\Filament\Resources\ManufacturerToSupplierResource\Pages;

use App\Filament\Resources\ManufacturerToSupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

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
