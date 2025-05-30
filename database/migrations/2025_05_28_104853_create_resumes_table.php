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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->foreign('template_id')
                ->references('id')
                ->on('templates')
                ->onDelete('set null');


            $table->string('title');
            $table->string('slug')->unique();
            $table->boolean('is_public')->default(false);

            $table->json('personal_info')->nullable();
            $table->json('experiences')->nullable();
            $table->json('educations')->nullable();
            $table->json('skills')->nullable();
            $table->json('projects')->nullable();
            $table->json('languages')->nullable();
            $table->json('certifications')->nullable();
            $table->unsignedBigInteger('template_id')->nullable();
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
