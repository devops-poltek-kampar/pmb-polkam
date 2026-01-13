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
            $table->id();
            $table->string('nama');
            $table->dateTime("open");
            $table->dateTime("close");
            $table->enum("status", ['OPEN', "CLOSE"]);
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
