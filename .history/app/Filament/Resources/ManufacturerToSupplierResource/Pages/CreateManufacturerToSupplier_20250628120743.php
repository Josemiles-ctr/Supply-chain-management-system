<?php

namespace App\Filament\Resources\ManufacturerToSupplierResource\Pages;

use App\Filament\Resources\ManufacturerToSupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateManufacturerToSupplier extends CreateRecord
{
    protected static string $resource = RawMaterialsPurchaseOrder::class;
}