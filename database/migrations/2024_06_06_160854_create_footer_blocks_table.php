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
        Schema::create('footer_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('picture')->nullable();
            $table->string('heading')->nullable();
            $table->text('paragraph')->nullable();
            $table->string('form_text')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_color')->nullable();
            $table->string('company_name')->nullable();
            $table->string('info')->nullable();
            $table->string('copyrights')->nullable();
            $table->foreignId('block_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_blocks');
    }
};
