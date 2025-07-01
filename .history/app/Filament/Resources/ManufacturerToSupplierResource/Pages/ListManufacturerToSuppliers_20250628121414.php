<?php

namespace App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages;

use App\Filament\Resources\RawMaterialsPurchaseOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListManufacturerToSuppliers extends ListRecords
{
    protected static string $resource = Manu::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}