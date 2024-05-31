<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Dokumentasi;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DokumentasiResource\Pages;
use App\Filament\Resources\DokumentasiResource\RelationManagers;

class DokumentasiResource extends Resource
{
    protected static ?string $model = Dokumentasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Caption')
                    ->maxLength(20)
                    ->required(),
                TextInput::make('link')
                    ->label('URL')
                    ->url()
                    ->required()
                    ->helperText('For example: https://www.google.com/'),
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
                    ->imageEditorMode(1),
                   
                DatePicker::make('dokumentasi_date')->required()->format('Y-m-d'),
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
            TextColumn::make('link')
                ->label('URL')
                ->copyable(),

                TextColumn::make('dokumentasi_date')
                ->label('Dokumentasi Date')
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
            'index' => Pages\ListDokumentasis::route('/'),
            'create' => Pages\CreateDokumentasi::route('/create'),
            'edit' => Pages\EditDokumentasi::route('/{record}/edit'),
        ];
    }
}
