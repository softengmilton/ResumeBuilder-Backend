<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'uuid' => Str::uuid()->toString(),
                'name' => 'Modern',
                'preview_image' => 'assets/img/templates/template1.png',
                'category' => 'Modern',
                'is_premium' => false,
                'view_component' => 'templates.template1',
                'rating' => 'popular',
                // 'config_schema' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' =>  Str::uuid()->toString(),
                'name' => 'Classic',
                'preview_image' => 'assets/img/templates/template2.png',
                'category' => 'Classic',
                'is_premium' => false,
                'view_component' => 'templates.template2',
                'rating' => 'new',
                // 'config_schema' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid()->toString(),
                'name' => 'Professional',
                'preview_image' => 'assets/img/templates/template3.png',
                'category' => 'Professional',
                'is_premium' => true,
                'view_component' => 'templates.template3',
                'rating' => 'trending',
                // 'config_schema' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($templates as $template) {
            Template::create($template);
        }
    }
}
