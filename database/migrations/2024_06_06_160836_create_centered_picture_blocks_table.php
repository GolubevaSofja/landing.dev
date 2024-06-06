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
        Schema::create('centered_picture_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('subheading')->nullable();
            $table->string('heading');
            $table->text('paragraph');
            $table->string('picture');
            $table->string('picture_size')->nullable();
            $table->string('alt_text')->nullable();
            $table->foreignId('block_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centered_picture_blocks');
    }
};
