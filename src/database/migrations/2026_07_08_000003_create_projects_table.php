<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('badge')->nullable();
            $table->text('short_description')->nullable();
            $table->text('background')->nullable();
            $table->json('problems')->nullable();
            $table->string('backend_tech')->nullable();
            $table->string('database_tech')->nullable();
            $table->string('frontend_tech')->nullable();
            $table->string('server_tech')->nullable();
            $table->string('diagram_image')->nullable();
            $table->string('pdf_file')->nullable();
            $table->string('detail_badge')->nullable();
            $table->string('detail_subtitle')->nullable();
            $table->text('solution_description')->nullable();
            $table->text('background_detail')->nullable();
            $table->json('features')->nullable();
            $table->json('architecture')->nullable();
            $table->text('diagram_note')->nullable();
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
