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
        Schema::create('pmb_jalur_masuk', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string("pmb_gelombang_id", 50);
            $table->string("pmb_jalur_id", 50);
            $table->integer('biaya_registrasi', false, false);
            $table->enum('status', ["Open", "Close"]);
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmb_jalur_masuk');
    }
};
