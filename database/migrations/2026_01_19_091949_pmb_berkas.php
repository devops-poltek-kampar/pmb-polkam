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
        Schema::create('pmb_berkas', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string("pmb_pengajuan_berkas_id", 50);
            $table->string('nama');
            $table->string('path', 255);
            $table->string('kategori', 50);
            $table->enum("status", ['Review', "Reject", "Accept"]);
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmb_berkas');
    }
};
