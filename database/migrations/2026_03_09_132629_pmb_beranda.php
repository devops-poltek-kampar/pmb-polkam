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
        Schema::create('pmb_beranda', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string("banner_path", 255);
            $table->string("link_video", 255);
            $table->string("path_img1");
            $table->string("path_img2");
            $table->string("path_img3");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmb_beranda');
    }
};
