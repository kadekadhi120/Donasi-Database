<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Models\Staff;
use App\Models\User;
use Filament\Actions;
use App\Filament\Resources\StaffResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CreateStaff extends CreateRecord
{
    protected static string $resource = StaffResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
 
        // Buat User baru
        $user = User::create([
            "name" => $data["staff_name"],
            "email" => 'email',
            "password" => Hash::make("password"),
        ]);

        // Hapus email dan password dari data
        // unset($data["email"], $data["password"]);

        // Tambahkan user_id ke data staff
        $data["user_id"] = $user->id;

        return $data;
    }

}
