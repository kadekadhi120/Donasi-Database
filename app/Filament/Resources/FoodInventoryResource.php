<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\FoodInventory;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FoodInventoryResource\Pages;
use App\Filament\Resources\FoodInventoryResource\RelationManagers;

class FoodInventoryResource extends Resource
{
    protected static ?string $model = FoodInventory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                    TextInput::make('food_id')->required()->unique(ignorable: fn ($record) => $record),
                    TextInput::make('food_name')->required(),
                    TextInput::make('quantity')->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('food_id')->sortable()->searchable(),
                TextColumn::make('food_name')->sortable()->searchable(),
                TextColumn::make('quantity')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListFoodInventories::route('/'),
            'create' => Pages\CreateFoodInventory::route('/create'),
            'edit' => Pages\EditFoodInventory::route('/{record}/edit'),
        ];
    }
}
