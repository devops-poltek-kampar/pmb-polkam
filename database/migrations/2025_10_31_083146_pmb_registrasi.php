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
        Schema::create('pmb_registrasi', function (Blueprint $table) {
            $table->id();
            $table->string("pmb_users_id");
            $table->string('nomor_registrasi');
            $table->string('nama');
            $table->string("tempat_lahir");
            $table->dateTime("tanggal_lahir");
            $table->string('alamat');
            $table->string("asal_kecamatan");
            $table->string("rt");
            $table->string("rw");
            $table->string("provinsi");
            $table->string("kode_pos");
            $table->string("hp_ortu");
            $table->string("hp_mahasiswa");
            $table->string("no_wa");
            $table->enum("agama", ["Islam", "Kristen Khatolik", "Kristen Protestan", "Hindu", "Budha", "Lainnya"]);
            $table->enum("status_nikah", ["Menikah", "Belum Menikah"]);
            $table->string("asal_sekolah");
            $table->string("jurusan");
            $table->string("info_daftar");
            $table->boolean("pernyataan_serah_data");
            $table->string("prodi_pilihan_1");
            $table->string("prodi_pilihan_2");
            $table->string("sumber_info_daftar");
            $table->enum("jalur_masuk", ['Reguler', "Prestasi Akademik", "Prestasi Non Akademik", "RPL"]);
            $table->enum("pembiayaan", ["Mandiri", "BPDP-KS", "Beasiswa KIP"]);
            $table->enum("status_bayar_registrasi", ["Pending", "Done"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmb_registrasi');
    }
};
