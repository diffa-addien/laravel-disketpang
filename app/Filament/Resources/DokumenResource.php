<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DokumenResource\Pages;
use App\Models\Dokumen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DokumenResource extends Resource
{
    protected static ?string $model = Dokumen::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';
    protected static ?string $navigationGroup = 'Konten';

    protected static ?string $navigationLabel = 'Publikasi Dokumen';
    protected static ?string $pluralModelLabel = 'Publikasi Dokumen';
    protected static ?string $modelLabel = 'Dokumen';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Dokumen')
                            ->required(),

                        Forms\Components\Textarea::make('description')
                            ->label('Keterangan Singkat'),
                        
                        // ==========================================================
                        // FIELD UPLOAD DOKUMEN DENGAN VALIDASI
                        // ==========================================================
                        Forms\Components\SpatieMediaLibraryFileUpload::make('dokumen')
                            ->label('File Dokumen')
                            ->collection('dokumen_file')
                            ->disk('uploads')
                            ->required()
                            ->acceptedFileTypes([
                                'application/pdf', // .pdf
                                'application/msword', // .doc
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                                'application/vnd.ms-excel', // .xls
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                            ])
                            ->maxSize(5120), // Maksimal 5MB

                        Forms\Components\Toggle::make('is_published')
                            ->label('Publikasikan')
                            ->default(true),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Judul')->searchable(),
                Tables\Columns\IconColumn::make('is_published')->label('Publikasi')->boolean(),
                Tables\Columns\TextColumn::make('updated_at')->label('Tanggal')->date('d M Y')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // ==========================================================
                // TOMBOL UNTUK DOWNLOAD LANGSUNG
                // ==========================================================
                Tables\Actions\Action::make('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (Dokumen $record) => $record->getFirstMediaUrl('dokumen_file'))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDokumens::route('/'),
        ];
    }
}