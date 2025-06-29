<?php

namespace App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages;

use App\Filament\Resources\RawMaterialsPurchaseOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRawMaterialsPurchaseOrder extends CreateRecord
{
    protected static string $resource = RawMaterialsPurchaseOrderResource::class;
}
protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['created_by'] = Auth::id();
    return $data;
}