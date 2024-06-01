<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Need;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Locations;
use Filament\Tables\Table;
use App\Models\FoodInventory;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\NeedResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NeedResource\RelationManagers;

class NeedResource extends Resource
{
    protected static ?string $model = Need::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('need_id')->required(),
                Select::make('location_id')
                    ->label('Location')
                    ->options(
                        Locations::all()->mapWithKeys(function ($location) {
                            return [$location->location_id => $location->location_id . ' - ' . $location->provinsi. ' - ' . $location->KabupatenKota. ' - ' . $location->kecamatan. ' - ' . $location->KelurahanDesa. ' - ' . $location->total_KK];
                        })
                    )
                    ->searchable()
                    ->required(),

                Select::make('food_id')
                    ->label('Food Inventory')
                    ->options(FoodInventory::all()->pluck('food_name', 'food_id'))
                    ->searchable()
                    ->required(),
                    TextInput::make('need_amount')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('need_id')
                ->label('Need ID')
                ->sortable()->searchable(),
            TextColumn::make('location.provinsi')
                ->label('Provinsi')
                ->sortable()->searchable(),
                TextColumn::make('location.KabupatenKota')
                ->label('KabupatenKota')
                ->sortable()->searchable(),
                TextColumn::make('location.kecamatan')
                ->label('kecamatan')
                ->sortable()->searchable(),
                TextColumn::make('location.KelurahanDesa')
                ->label('KelurahanDesa')
                ->sortable()->searchable(),
                TextColumn::make('location.RTRW')
                ->label('RTRW')
                ->sortable()->searchable(),
                TextColumn::make('location.total_KK')
                ->label('total_KK')
                ->sortable()->searchable(),
            TextColumn::make('foodInventory.food_name')
                ->label('Food Name')
                ->sortable()->searchable(),
            TextColumn::make('need_amount')
                ->label('Need Amount')
                ->sortable()->searchable(),
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
            'index' => Pages\ListNeeds::route('/'),
            'create' => Pages\CreateNeed::route('/create'),
            'edit' => Pages\EditNeed::route('/{record}/edit'),
        ];
    }
}
