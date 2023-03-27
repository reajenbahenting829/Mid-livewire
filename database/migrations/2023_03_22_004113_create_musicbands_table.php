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
        Schema::create('musicbands', function (Blueprint $table) {
            $table->id();
            $table->string('bandName');
            $table->string('location');
            $table->integer('year_started');
            $table->integer('groupNum');
            $table->decimal('rate');
            $table->string('genre');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicbands');
    }
};
