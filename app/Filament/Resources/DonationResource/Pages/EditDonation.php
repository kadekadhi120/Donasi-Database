<?php
namespace App\Filament\Resources\DonationResource\Pages;

use App\Filament\Resources\DonationResource;
use App\Models\FoodInventory;
use App\Models\Donation;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDonation extends EditRecord
{
    protected static string $resource = DonationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Ambil record donasi yang sedang diedit
        $donation = Donation::findOrFail($this->record->id);

        // Ambil inventory makanan yang sesuai dengan food_id donasi yang sedang diedit
        $foodInventory = FoodInventory::where('food_id', $donation->food_id)->first();

        // Jika inventaris makanan ditemukan
        if ($foodInventory) {
            // Kurangi quantity dengan donasi lama
            $foodInventory->quantity -= $donation->donation_amount;

            // Tambahkan quantity dengan donasi baru
            $foodInventory->quantity += $data['donation_amount'];
            $foodInventory->save();
        } else {
            throw new \Exception('Selected food inventory item does not exist.');
        }

        return $data;
    }
}
