<?php

namespace App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages;

use auth;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource;

class CreateRawMaterialsPurchaseOrder extends CreateRecord
{
    protected static string $resource = RawMaterialsPurchaseOrderResource::class;
    
    public static function canCreate(): bool
    {
        return auth()->user()?->role === 'manufacturer';
    }
    


    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['created_by'] = Auth::id();
    $data['order_date'] = now()->format('Y-m-d');
    $data['expected_delivery_date'] = now()->addDays(3)->format('Y-m-d');
    $data['status'] = 'pending'; // Default status for new orders
    return $data;
}
}