<?php
namespace App\Filament\Resources\NeedResource\Pages;

use Filament\Actions;
use App\Models\FoodInventory;
use App\Filament\Resources\NeedResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNeed extends CreateRecord
{
    protected static string $resource = NeedResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['staff_id'] = auth()->user()->staff()->first()->staff_id;

        $foodInventory = FoodInventory::where('food_id', $data['food_id'])->first();
        if ($foodInventory) {
            $foodInventory->quantity -= $data['need_amount'];
            $foodInventory->save();
        } else {
            throw new \Exception('Selected food inventory item does not exist.');
        }
        return $data;
    }
}
