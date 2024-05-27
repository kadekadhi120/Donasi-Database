<?php

namespace App\Filament\Resources\StaffResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\StaffResource;

class EditStaff extends EditRecord
{
    protected static string $resource = StaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['password'])) {
            unset($data['email'], $data['password']);
        }

        return $data;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                    TextInput::make('staff_id')->required()->unique(ignorable: fn ($record) => $record),
                    TextInput::make('staff_name')->required(),
                    TextInput::make('staff_address')->required(),
                    TextInput::make('staff_contact')->required(),
                    ])
                    ->columns(2),
                Card::make()
                    ->relationship('user')
                    ->schema([
                        TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
                        TextInput::make('password'),
                    ])
                    ->columns(2)
            ]);
    }
}
