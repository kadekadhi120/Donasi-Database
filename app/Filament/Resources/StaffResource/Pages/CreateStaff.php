<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Models\Staff;
use App\Models\User;
use Filament\Actions;
use App\Filament\Resources\StaffResource;
use Filament\Resources\Pages\CreateRecord;
use Hash;

class CreateStaff extends CreateRecord
{
    protected static string $resource = StaffResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = User::create([
            "name"=> $data["staff_name"],
            "email"=> $data["email"],
            "password"=> Hash::make($data["password"]),
        ]);

        unset($data["email"], $data["password"]);

        $data["user_id"] = $user->id;

        return $data;
    }
}
