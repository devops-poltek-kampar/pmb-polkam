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
        Schema::create('pmb_gelombang', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string("nama", 255);
            $table->year('tahun');
            $table->date('open');
            $table->date('close');
            $table->enum('status', ["OPEN", "CLOSE"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmb_gelombang');
    }
};
