<?php

namespace App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages;

use App\Filament\Resources\RawMaterialsPurchaseOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class  extends EditRecord
{
    protected static string $resource = RawMaterialsPurchaseOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}