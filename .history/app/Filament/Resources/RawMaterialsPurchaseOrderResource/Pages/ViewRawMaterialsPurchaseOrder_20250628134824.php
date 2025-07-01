<?php

namespace App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages;

use App\Filament\Resources\RawMaterialsPurchaseOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRawMaterialsPurchaseOrder extends ViewRecord
{
    protected static string $resource = RawMaterialsPurchaseOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
            ->,
        ];
    }
}