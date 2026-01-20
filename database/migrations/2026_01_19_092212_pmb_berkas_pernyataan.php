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
        Schema::create('pmb_berkas_pernyataan', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string("nomor_registrasi", 50);
            $table->string('path', 255);
            $table->enum('status', ["Review", "Reject", "Approve"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmb_berkas_pernyataan');
    }
};
