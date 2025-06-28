<?php

namespace App\Filament\Resources\ManufactuResource\Pages;

use App\Filament\Resources\ManufacturerToSupplierResource;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditManufacturerToSupplier extends EditRecord
{
    protected static string $resource = ManufacturerToSupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}