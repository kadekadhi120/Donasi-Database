<?php

namespace App\Filament\Resources\FoodInventoryResource\Pages;

use App\Filament\Resources\FoodInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFoodInventories extends ListRecords
{
    protected static string $resource = FoodInventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
