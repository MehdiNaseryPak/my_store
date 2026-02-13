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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('title_fa');
            $table->string('title_en');
            $table->string('summary_fa');
            $table->string('summary_en');
            $table->text('image');
            $table->string('introduction_fa');
            $table->string('introduction_en');
            $table->string('instagram_link')->nullable();
            $table->string('linkdin_link')->nullable();
            $table->string('telegram_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
