<?php

namespace App\Filament\Resources\OpenDonasiResource\Pages;

use App\Filament\Resources\OpenDonasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOpenDonasi extends EditRecord
{
    protected static string $resource = OpenDonasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
