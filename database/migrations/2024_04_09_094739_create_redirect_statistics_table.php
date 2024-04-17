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
        Schema::create('redirect_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('short_url_id')->references('id')->on('short_urls')
                ->cascadeOnDelete();
            $table->unsignedBigInteger('redirect_count')->default(1);
            $table->timestamps();
            $table->unique('short_url_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redirect_statistics');
    }
};
