<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('status')->default('development')->after('badge');
            $table->unsignedTinyInteger('progress')->default(0)->after('status');
            $table->json('tech_tags')->nullable()->after('progress');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['status', 'progress', 'tech_tags']);
        });
    }
};
