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
        $defaultLogo = 'images/logo.svg';

        // Copy default logo if it doesn't exist
        if (!Storage::disk('public')->exists($defaultLogo)) {
            Storage::disk('public')->put(
                $defaultLogo,
                file_get_contents(public_path('images/logo.svg'))
            );
        }
        $settings = [
            'logo_path' => $defaultLogo,
            'site_title' => 'Enhance',
            'site_phone' => '+88 01850267268',
            'site_description' => 'Pick a resume template and build your resume in minutes!',
            'site_email' => 'info@enhance.com',
            'site_address' => '1234 Zindabazar St, Sylhet, Bangladesh',
            'site_facebook_link' => 'https://facebook.com/enhance',
            'site_twitter_link' => 'https://twitter.com/enhance',
            'site_instagram_link' => 'https://instagram.com/enhance',
            'site_linkedin_link' => 'https://linkedin.com/company/enhance',
        ];
        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
