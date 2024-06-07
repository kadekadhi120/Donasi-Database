<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\OpenDonasi;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OpenDonasiResource\Pages;
use App\Filament\Resources\OpenDonasiResource\RelationManagers;

class OpenDonasiResource extends Resource
{
    protected static ?string $model = OpenDonasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul')
                    ->maxLength(20)
                    ->required(),
                TextInput::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('path')
                    ->required()
                    ->label('Gambar')
                    ->placeholder('Seret atau klik untuk memilih gambar')
                    ->confirmSvgEditing()
                    ->downloadable()
                    ->openable()
                    ->previewable()
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                    ])
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeMode('cover')
                    ->imageEditorMode(1)
                    ->columnSpanFull(),
                   
                DatePicker::make('open_date')->required()->format('Y-m-d'),
                DatePicker::make('close_date')->required()->format('Y-m-d'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('path')
                ->label('Gambar')
                ->square(),
            TextColumn::make('title')
                ->label('Caption/Judul')
                ->copyable(),
            TextColumn::make('deskripsi')
                ->label('Deskripsi')
                ->copyable(),
                TextColumn::make('open_date')
                ->label('Open Date Donasi')
                ->sortable()->searchable()
                ->date('Y-m-d'),
                TextColumn::make('close_date')
                ->label('Close Date Donasi')
                ->sortable()->searchable()
                ->date('Y-m-d'),
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
            'index' => Pages\ListOpenDonasis::route('/'),
            'create' => Pages\CreateOpenDonasi::route('/create'),
            'edit' => Pages\EditOpenDonasi::route('/{record}/edit'),
        ];
    }
}
