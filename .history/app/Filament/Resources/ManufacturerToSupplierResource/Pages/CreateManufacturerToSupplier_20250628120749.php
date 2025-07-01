<?php

namespace App\Filament\Resources\ManufacturerToSupplierResource\Pages;

use Filament\Actions;
use App\Models\RawMaterialsPurchaseOrder;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ManufacturerToSupplierResource;

class CreateManufacturerToSupplier extends CreateRecord
{
    protected static string $resource = RawMaterialsPurchaseOrder::class;
}