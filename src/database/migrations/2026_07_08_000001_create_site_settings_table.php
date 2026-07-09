<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
            $table->string('navbar_brand')->nullable();
            $table->string('navbar_highlight')->nullable();
            $table->string('student_name')->nullable();
            $table->string('student_nim')->nullable();
            $table->string('footer_text')->nullable();
            $table->string('home_welcome_badge')->nullable();
            $table->string('home_greeting')->nullable();
            $table->string('home_name_highlight')->nullable();
            $table->string('home_subtitle')->nullable();
            $table->text('home_bio')->nullable();
            $table->string('home_quote')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('contact_title')->nullable();
            $table->string('contact_subtitle')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
