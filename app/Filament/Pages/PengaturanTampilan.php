<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class PengaturanTampilan extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-paint-brush';
    protected static string $view = 'filament.pages.pengaturan-tampilan';

    protected static ?string $navigationGroup = 'Pengaturan Web';
    protected static ?string $navigationLabel = 'Background';
    protected static ?string $title = 'Pengaturan Tampilan';

    public ?array $data = [];

    public function mount(): void
    {
        $setting = Setting::firstOrCreate(['key' => 'hero_background']);
        $this->form->fill($setting->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                SpatieMediaLibraryFileUpload::make('hero_image')
                    ->label('Gambar Latar Utama')
                    ->collection('hero_background')
                    ->image()
                    ->imageEditor()
                    ->disk('uploads')
                    ->helperText('Unggah gambar yang akan dijadikan background di halaman depan. Rekomendasi resolusi 1920x1080px.')
            ])
            ->model(Setting::firstOrCreate(['key' => 'hero_background']))
            ->statePath('data');
    }

    // =================================================================
    // FUNGSI SAVE YANG DIPERBAIKI
    // =================================================================
    public function save(): void
    {
        try {
            // 1. Ambil model setting secara eksplisit dari database.
            //    Ini memastikan variabel $setting adalah objek Eloquent.
            $setting = Setting::where('key', 'hero_background')->first();

            // 2. Ambil data dari form dan biarkan Filament/Spatie yang memproses
            //    file upload secara otomatis karena form sudah di-bind ke model.
            $dataToUpdate = $this->form->getState();

            // 3. Panggil update pada objek model yang benar.
            $setting->update($dataToUpdate);

            Notification::make()
                ->title('Pengaturan berhasil disimpan')
                ->success()
                ->send();

        } catch (\Exception $e) {
            Notification::make()
                ->title('Gagal menyimpan pengaturan')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }
}