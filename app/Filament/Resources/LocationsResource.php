<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Locations;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LocationsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LocationsResource\RelationManagers;

class LocationsResource extends Resource
{
    protected static ?string $model = Locations::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                TextInput::make('location_id')->required()->unique(ignorable: fn ($record) => $record),
                TextInput::make('provinsi')->required(),
                TextInput::make('KabupatenKota')->required(),
                TextInput::make('kecamatan')->required(),
                TextInput::make('KelurahanDesa')->required(),
                TextInput::make('RTRW')->required(),
                TextInput::make('total_KK')->required(),
                DatePicker::make('date')->required()->format('y-m-d'),
    
                ])
                ->columns(2), 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('location_id')->sortable()->searchable(),
                TextColumn::make('provinsi')->sortable()->searchable(),
                TextColumn::make('KabupatenKota')->sortable()->searchable(),
                TextColumn::make('kecamatan')->sortable()->searchable(),
                TextColumn::make('KelurahanDesa')->sortable()->searchable(),
                TextColumn::make('RTRW')->sortable()->searchable(),
                TextColumn::make('total_KK')->sortable()->searchable(),
                TextColumn::make('date')->sortable()->searchable(),
                
    
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
            'index' => Pages\ListLocations::route('/'),
            'create' => Pages\CreateLocations::route('/create'),
            'edit' => Pages\EditLocations::route('/{record}/edit'),
        ];
    }
}
