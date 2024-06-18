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
        Schema::create('backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('picture')->nullable();
            $table->string('picture_size')->nullable();
            $table->string('picture_position')->nullable();
            $table->string('color')->default('white');
            $table->integer('margin_top')->default(0);
            $table->integer('margin_left')->default(0);
            $table->boolean('triangle_visible')->default(false);
            $table->string('triangle_color')->nullable();
            # $table->foreignId('block_from')->constrained()->cascadeOnDelete();
            $table->foreignId('block_from')->constrained('blocks')->cascadeOnDelete();
            # $table->foreignId('block_to')->constrained()->cascadeOnDelete();
            $table->foreignId('block_to')->constrained('blocks')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backgrounds');
    }
};
