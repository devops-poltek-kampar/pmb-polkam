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
        Schema::create('pmb_dokumen_registrasi', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string("pmb_registrasi_id", 50);
            $table->string('pmb_jalur_masuk_id', 50);
            $table->string('nama', 255);
            $table->string('path', 255);
            $table->enum("status", ["Accept", "Reject", "Review"]);
            $table->string('kategori', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmb_dokumen_registrasi');
    }
};
