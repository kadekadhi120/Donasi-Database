<?php

namespace App\Filament\Resources\NeedResource\Pages;

use App\Models\Need;
use Filament\Actions;
use App\Models\FoodInventory;
use App\Filament\Resources\NeedResource;
use Filament\Resources\Pages\EditRecord;

class EditNeed extends EditRecord
{
    protected static string $resource = NeedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Ambil record donasi yang sedang diedit
        $need = Need::findOrFail($this->record->id);

        // Ambil inventory makanan yang sesuai dengan food_id donasi yang sedang diedit
        $foodInventory = FoodInventory::where('food_id', $need->food_id)->first();

        // Jika inventaris makanan ditemukan
        if ($foodInventory) {
            // Kurangi quantity dengan donasi lama
            $foodInventory->quantity += $need->need_amount;

            // Tambahkan quantity dengan donasi baru
            $foodInventory->quantity -= $data['need_amount'];
            $foodInventory->save();
        } else {
            throw new \Exception('Selected food inventory item does not exist.');
        }

        return $data;
    }
}
