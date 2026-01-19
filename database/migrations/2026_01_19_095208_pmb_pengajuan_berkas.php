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
        Schema::create('pmb_pengajuan_berkas', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('pmb_users_id');
            $table->string("nomor_registrasi", 50);
            $table->string("pmb_jalur_masuk_id", 50);
            $table->enum('status', ["Reject", "Review", "Verified"]);
            $table->enum('aktif', ['Y', "N"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmb_pengajuan_berkas');
    }
};
