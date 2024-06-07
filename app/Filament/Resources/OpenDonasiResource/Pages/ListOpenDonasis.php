<?php

namespace App\Filament\Resources\OpenDonasiResource\Pages;

use App\Filament\Resources\OpenDonasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOpenDonasis extends ListRecords
{
    protected static string $resource = OpenDonasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
