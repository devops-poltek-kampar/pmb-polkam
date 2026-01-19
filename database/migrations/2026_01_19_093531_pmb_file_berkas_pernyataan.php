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
        Schema::create('pmb_file_berkas_pernyataan', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string("pmb_berkas_pernyataan_id", 50);
            $table->text("path");
            $table->enum('status', ['Review', "Reject", "Approve"]);
            $table->string('kategori', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmb_file_berkas_pernyataan');
    }
};
