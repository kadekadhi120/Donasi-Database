<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Need;
use Filament\Tables;
use App\Models\Staff;
use Filament\Forms\Form;
use App\Models\Locations;
use App\Models\Volunteer;
use Filament\Tables\Table;
use App\Models\Distribution;
use App\Models\FoodInventory;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DistributionResource\Pages;
use App\Filament\Resources\DistributionResource\RelationManagers;

class DistributionResource extends Resource
{
    protected static ?string $model = Distribution::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('distribution_id')->required(),
                Select::make('need_id')
                    ->label('Barang Yang Didonasikan')
                    ->options(
                        Need::all()->mapWithKeys(function ($needs) {
                            return [$needs->need_id => $needs->need_id . ' - ' . $needs->location_id];
                        })
                    )
                    ->searchable()
                    ->required(),

                    Select::make('location_id')
                    ->label('Location')
                    ->options(
                        Locations::all()->mapWithKeys(function ($location) {
                            return [$location->location_id => $location->location_id . ' - ' . $location->provinsi. ' - ' . $location->KabupatenKota. ' - ' . $location->kecamatan. ' - ' . $location->KelurahanDesa. ' - ' . $location->total_KK];
                        })
                    )
                    ->searchable()
                    ->required(),

                    Select::make('volunteer_id')
                    ->label('Volunteer')
                    ->options(
                        Volunteer::all()->mapWithKeys(function ($volunteers) {
                            return [$volunteers->volunteer_id => $volunteers->volunteer_id . ' - ' . $volunteers->volunteer_name];
                        })
                    )
                    ->searchable()
                    ->required(),

                    Select::make('staff_id')
                    ->label('Staff')
                    ->options(
                        Staff::all()->mapWithKeys(function ($staff) {
                            return [$staff->staff_id => $staff->staff_id. ' - ' . $staff->staff_name];
                        })
                    )
                    ->searchable()
                    ->required(),

                    TextInput::make('link')
                    ->label('URL')
                    ->url()
                    ->required()
                    ->helperText('For example: https://www.google.com/'),
                
                    TextInput::make('deskripsi')->required(),

                    DatePicker::make('distribution_date')->required()->format('Y-m-d'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListDistributions::route('/'),
            'create' => Pages\CreateDistribution::route('/create'),
            'edit' => Pages\EditDistribution::route('/{record}/edit'),
        ];
    }
}
