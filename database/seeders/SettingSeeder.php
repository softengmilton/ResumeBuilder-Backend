<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultLogo = 'images/logo.png';

        // Copy default logo if it doesn't exist
        if (!Storage::disk('public')->exists($defaultLogo)) {
            Storage::disk('public')->put(
                $defaultLogo,
                file_get_contents(public_path('images/logo.png'))
            );
        }

        $settings = [
            'logo_path' => $defaultLogo,
            'site_title' => 'Shaadiya',
            'site_phone' => '+88 01850267268',
            'site_description' => 'Welcome to Shaadiya, where relationships begin.',
            'site_email' => 'info@shaadiya.com',
            'site_address' => '1234 Zindabazar St, Sylhet, Bangladesh',
            'site_insta_link' => 'https://instagram.com/shaadiya',
            'site_tiktok_link' => 'https://tiktok.com/@shaadiya',
            'site_gmail_link' => 'mailto:contact@shaadiya.com',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
