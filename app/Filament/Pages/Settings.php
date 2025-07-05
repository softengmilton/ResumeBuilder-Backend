<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static string $view = 'filament.pages.settings';
    protected static ?string $title = 'Software Setup';
    protected static ?string $navigationLabel = 'Site Settings';
    protected static ?string $navigationGroup = 'System';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        // Add current logo URL for preview
        if (!empty($settings['logo_path'])) {
            $settings['current_logo_url'] = Storage::url($settings['logo_path']);
        }

        $this->form->fill($settings);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Branding')
                    ->schema([
                        FileUpload::make('logo_path')
                            ->label('UPLOAD NEW LOGO')
                            ->directory('settings')
                            ->image()
                            ->imagePreviewHeight(150)
                            ->panelAspectRatio('3:1')
                            ->visibility('public')
                            ->preserveFilenames()
                            ->disk('public')
                            ->maxSize(800)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                            ->helperText('Allowed JPG, GIF or PNG. Max size of 800K')
                            ->columnSpanFull(),
                    ]),

                Section::make('Site Information')
                    ->schema([
                        TextInput::make('site_title')
                            ->label('Site Title')
                            ->required(),

                        TextInput::make('site_phone')
                            ->label('Site Number')
                            ->tel()
                            ->required(),

                        TextInput::make('site_description')
                            ->label('Site Description')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Contact Information')
                    ->schema([
                        TextInput::make('site_email')
                            ->label('Site Email')
                            ->email()
                            ->required(),

                        TextInput::make('site_address')
                            ->label('Site Address')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make('Social Links')
                    ->schema([
                        TextInput::make('site_insta_link')
                            ->label('Instagram Link')
                            ->url(),

                        TextInput::make('site_tiktok_link')
                            ->label('TikTok Link')
                            ->url(),

                        TextInput::make('site_gmail_link')
                            ->label('Gmail Link')
                            ->url(),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $state = $this->form->getState();

        // Handle logo upload
        if (isset($state['logo_path'])) {
            if ($state['logo_path'] instanceof TemporaryUploadedFile) {
                // Delete old logo if exists
                $currentLogo = Setting::where('key', 'logo_path')->value('value');
                if ($currentLogo && Storage::disk('public')->exists($currentLogo)) {
                    Storage::disk('public')->delete($currentLogo);
                }

                // Store new logo
                $logoPath = $state['logo_path']->store('settings', 'public');
                Setting::updateOrCreate(['key' => 'logo_path'], ['value' => $logoPath]);
            } elseif (is_string($state['logo_path'])) {
                // Keep existing logo if no new one was uploaded
                Setting::updateOrCreate(['key' => 'logo_path'], ['value' => $state['logo_path']]);
            }
        }

        // Handle other fields
        foreach ($state as $key => $value) {
            if ($key !== 'logo_path') {
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }

        Notification::make()
            ->title('Settings saved successfully')
            ->success()
            ->send();

        $this->mount(); // Refresh form with new values
    }

    public function removeLogo(): void
    {
        $current = Setting::where('key', 'logo_path')->value('value');
        if ($current && Storage::disk('public')->exists($current)) {
            Storage::disk('public')->delete($current);
        }

        Setting::where('key', 'logo_path')->delete();
        $this->form->fill(['logo_path' => null]);

        Notification::make()
            ->title('Logo removed successfully')
            ->success()
            ->send();
    }
}
