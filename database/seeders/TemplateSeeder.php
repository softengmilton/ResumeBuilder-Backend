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
                'preview_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwm7N7QxVqSHeNyONdm_fq-lO-l8VF_JrG1Q&s',
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
                'preview_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwm7N7QxVqSHeNyONdm_fq-lO-l8VF_JrG1Q&s',
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
                'preview_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwm7N7QxVqSHeNyONdm_fq-lO-l8VF_JrG1Q&s',
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
