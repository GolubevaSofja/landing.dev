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
        Schema::create('dropdown_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('picture')->nullable();
            $table->string('picture_size')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('subheading')->nullable();
            $table->string('heading_logo')->nullable();
            $table->string('heading');
            $table->string('element_type');
            $table->string('orientation')->nullable();
            $table->string('main_color')->nullable();
            $table->foreignId('block_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dropdown_blocks');
    }
};
