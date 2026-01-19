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
        Schema::create('pmb_forgot_password', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string("pmb_users_email");
            $table->integer('token', false, false);
            $table->enum('aktif', ["Y", "N"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmb_forgot_password');
    }
};
