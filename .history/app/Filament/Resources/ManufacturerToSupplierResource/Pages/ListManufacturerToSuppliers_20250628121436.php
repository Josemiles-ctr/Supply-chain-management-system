<?php

namespace App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ManufacturerToSupplierResource;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource;

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