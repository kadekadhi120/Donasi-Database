<?php
namespace App\Filament\Resources\NeedResource\Pages;

use Filament\Actions;
use App\Models\FoodInventory;
use App\Filament\Resources\NeedResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNeed extends CreateRecord
{
    protected static string $resource = NeedResource::class;

    protected function afterSave($record, $data)
    {
        $data['staff_id'] = auth()->user()->staff()->first()->staff_id;

    $foodInventory = FoodInventory::where('food_id', $data['food_id'])->first();
    if ($foodInventory) {
        $foodInventory->quantity -= $data['quantity'];
        $foodInventory->save();

        // Debugging log
        \Log::info('Food inventory updated successfully.');
    } else {
        throw new \Exception('Selected food inventory item does not exist.');
    }

    // Debugging log
    \Log::info('Data after save: ' . json_encode($data));

    return $data;
    }
}
