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
        Schema::create('dropdown_block_elements', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('paragraph1')->nullable();
            $table->text('paragraph2')->nullable();
            $table->string('link')->nullable();
            $table->string('link_text')->nullable();
            $table->integer('index');
            $table->boolean('active_element')->default(false);
            $table->foreignId('block_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dropdown_block_elements');
    }
};
