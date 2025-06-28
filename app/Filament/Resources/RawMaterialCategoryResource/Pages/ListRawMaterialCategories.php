<?php

namespace App\Filament\Resources\RawMaterialCategoryResource\Pages;

use App\Filament\Resources\RawMaterialCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRawMaterialCategories extends ListRecords
{
    protected static string $resource = RawMaterialCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
