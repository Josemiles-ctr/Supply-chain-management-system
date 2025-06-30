<?php

namespace App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource;

class CreateRawMaterialsPurchaseOrder extends CreateRecord
{
    protected static string $resource = RawMaterialsPurchaseOrderResource::class;
    
    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['created_by'] = Auth::id();
    $data['order_date'] = now()->format('Y-m-d');
    $data['expected_delivery_date'] = now()->addDays(3)->format('Y
    return $data;
}
}