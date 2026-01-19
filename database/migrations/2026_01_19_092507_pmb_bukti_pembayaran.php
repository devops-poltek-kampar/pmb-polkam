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
        Schema::create('pmb_bukti_pembayaran', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string("nomor_registrasi");
            $table->string('path');
            $table->enum("status", ["Review", "Reject", "Approve"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmb_bukti_pembayaran');
    }
};
