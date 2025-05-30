<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('preview_image');
            $table->string('category');
            $table->enum('rating', ['popular', 'new', 'trending', 'most used'])->default('new');
            $table->boolean('is_premium')->default(false);
            $table->string('view_component'); // Livewire component name
            // $table->json('config_schema')->nullable(); // JSON schema for template configuration
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
