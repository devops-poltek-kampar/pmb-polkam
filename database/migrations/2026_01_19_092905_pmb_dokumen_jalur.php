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
        Schema::create('pmb_dokumen_jalur', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string("pmb_jalur_masuk_id");
            $table->string('nama', 50);
            $table->string('name_attribute', 50);
            $table->enum("tipe", ["pdf", 'jpg', 'jpeg', 'png']);
            $table->enum("sifat", ["required", "not required"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmb_dokumen_jalur');
    }
};
