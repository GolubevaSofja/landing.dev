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
        Schema::create('head_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('bg_color')->nullable();
            $table->string('font_color')->nullable();
            $table->string('meta_name')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('scripts')->nullable();
            $table->unsignedBigInteger('block_id');
            $table->timestamps();

            $table->foreign('block_id')->references('id')->on('blocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('head_blocks');
    }
};
