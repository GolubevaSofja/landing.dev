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
        Schema::create('column_elements', function (Blueprint $table) {
            $table->id();
            $table->string('picture')->nullable();
            $table->string('picture_position')->nullable();
            $table->string('header')->nullable();
            $table->text('paragraph')->nullable();
            $table->integer('index');
            $table->string('width')->nullable();
            $table->foreignId('block_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('column_elements');
    }
};
