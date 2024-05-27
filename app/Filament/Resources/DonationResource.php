<?php

namespace App\Filament\Resources;

use App\Models\Donor;
use App\Models\FoodInventory;
use Filament\Forms;
use Filament\Tables;
use App\Models\Donation;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DonationResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DonationResource\RelationManagers;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('donation_id')->required(),
                // TextInput::make('donor_NIK')->label('Donor')->required(),
                Select::make("donor_NIK")
                ->label("Donor Name")
                ->options(Donor::all()->pluck('donor_name', 'donor_NIK'))
                    ->searchable()
                    ->required(),
                Select::make('food_id')
                    ->label('Food Inventory')
                    ->options(FoodInventory::all()->pluck('food_name', 'food_id'))
                    ->searchable()
                    ->required(),
                TextInput::make('donation_amount')->required(),
                DatePicker::make('donation_date')->required()->format('Y-m-d'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
            ])
            ->filters([ 
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDonations::route('/'),
            'create' => Pages\CreateDonation::route('/create'),
            'edit' => Pages\EditDonation::route('/{record}/edit'),
        ];
    }
}
