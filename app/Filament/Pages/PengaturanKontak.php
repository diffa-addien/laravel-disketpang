<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class PengaturanKontak extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static string $view = 'filament.pages.pengaturan-kontak';

    protected static ?string $navigationGroup = 'Pengaturan Web';
    protected static ?string $navigationLabel = 'Kontak';
    protected static ?string $title = 'Pengaturan Kontak';

    public ?array $data = [];

    // Daftar kunci (key) pengaturan yang akan kita kelola di halaman ini
    protected array $settingKeys = [
        'contact_email', 'contact_phone', 'contact_address',
        'social_facebook', 'social_instagram', 'social_youtube', 'social_twitter',
    ];

    public function mount(): void
    {
        // Ambil semua data setting yang relevan, ubah menjadi array [key => value]
        $settings = Setting::whereIn('key', $this->settingKeys)->pluck('value', 'key')->all();
        // Isi form dengan data tersebut
        $this->form->fill($settings);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Utama')
                    ->schema([
                        TextInput::make('contact_email')->label('Alamat Email')->email(),
                        TextInput::make('contact_phone')->label('Nomor Telepon/Whatsapp'),
                        TextInput::make('contact_address')->label('Alamat Kantor')->columnSpanFull(),
                    ])->columns(2),

                Section::make('Media Sosial')
                    ->description('Isi dengan URL lengkap profil media sosial Anda.')
                    ->schema([
                        TextInput::make('social_facebook')->label('Facebook')->url(),
                        TextInput::make('social_instagram')->label('Instagram')->url(),
                        TextInput::make('social_youtube')->label('YouTube')->url(),
                        TextInput::make('social_twitter')->label('Twitter / X')->url(),
                    ])->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        try {
            // Ambil semua data dari form
            $formData = $this->form->getState();

            // Loop setiap data dan simpan ke database menggunakan updateOrCreate
            foreach ($formData as $key => $value) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value ?? '']
                );
            }

            Notification::make()->title('Pengaturan kontak berhasil disimpan')->success()->send();
        } catch (\Exception $e) {
            Notification::make()->title('Gagal menyimpan pengaturan')->body($e->getMessage())->danger()->send();
        }
    }
}