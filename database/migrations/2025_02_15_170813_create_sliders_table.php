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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->text('slide_image')->nullable();
            $table->string('slide_text')->nullable();
            $table->string('slide_subtext')->nullable();
            $table->string('slide_price')->nullable();
            $table->string('slide_link')->nullable();
            $table->string('slide_ordem')->nullable();
            $table->boolean('slide_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
