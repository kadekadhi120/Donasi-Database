<?php

namespace App\Filament\Resources\DonationResource\Pages;

use Filament\Actions;
use App\Models\FoodInventory;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\DonationResource;

class CreateDonation extends CreateRecord
{
    protected static string $resource = DonationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['staff_id'] = auth()->user()->staff()->first()->staff_id;

        $foodInventory = FoodInventory::where('food_id', $data['food_id'])->first();
        if ($foodInventory) {
            $foodInventory->quantity += $data['donation_amount'];
            $foodInventory->save();
        } else {
            throw new \Exception('Selected food inventory item does not exist.');
        }
        return $data;
    }
}
