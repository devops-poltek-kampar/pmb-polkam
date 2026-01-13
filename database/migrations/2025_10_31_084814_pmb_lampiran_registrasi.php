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
        Schema::create('pmb_lampiran_registrasi', function (Blueprint $table) {
            $table->id();
            $table->string("pmb_registrsi_id");
            $table->string("nama");
            $table->string("path");
            $table->enum("status", ["Accept", "Reject", "Review"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmb_lampiran_registrasi');
    }
};
