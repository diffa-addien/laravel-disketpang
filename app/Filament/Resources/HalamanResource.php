<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HalamanResource\Pages;
use App\Models\Halaman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class HalamanResource extends Resource
{
    protected static ?string $model = Halaman::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $navigationLabel = 'Halaman';
    protected static ?string $pluralModelLabel = 'Halaman';
    protected static ?string $modelLabel = 'Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->unique(Halaman::class, 'slug', ignoreRecord: true),
                        
                        // ==========================================================
                        // FIELD BARU UNTUK KATEGORI
                        // ==========================================================
                        Forms\Components\Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'Profil' => 'Profil',
                                'Lainnya' => 'Lainnya',
                            ])
                            ->required()
                            ->default('Lainnya'),

                        Forms\Components\Toggle::make('is_published')
                            ->label('Publikasikan')
                            ->default(true),

                        Forms\Components\RichEditor::make('content')
                            ->label('Konten Halaman')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                
                // ==========================================================
                // KOLOM BARU UNTUK KATEGORI
                // ==========================================================
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status Publikasi')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('Lihat')
                    ->url(fn (Halaman $record): string => route('halaman.show', $record->slug))
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Hapus Halaman')
                    ->modalDescription('Apakah Anda yakin ingin menghapus halaman ini? Menghapus halaman akan menghilangkan tautan di menu atau bagian lain di website publik. Aksi ini tidak bisa dibatalkan.')
                    ->modalSubmitActionLabel('Ya, Hapus!')
                    ->form(fn (Halaman $record) => [
                        Forms\Components\TextInput::make('title_confirmation')
                            ->label("Ketik '{$record->title}' untuk konfirmasi")
                            ->required()
                            ->rules([ Rule::in([$record->title]), ]),
                    ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([ Tables\Actions\DeleteBulkAction::make(), ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHalamen::route('/'),
        ];
    }
}