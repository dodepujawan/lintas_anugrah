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
        Schema::create('mcustomer', function (Blueprint $table) {
             $table->id();

            // DATA CUSTOMER
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('jenis_usaha')->nullable();
            $table->text('alamat')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kota')->nullable();
            $table->string('telepon')->nullable();
            $table->string('fax')->nullable();
            $table->string('kontak')->nullable();
            $table->string('email')->nullable();
            $table->string('npwp')->nullable();
            $table->string('top_kredit')->nullable();

            // PURCHASING
            $table->string('purchasing_nama')->nullable();
            $table->string('purchasing_email')->nullable();
            $table->string('purchasing_extensi_hp')->nullable();

            // DATA PAJAK
            $table->string('data_pajak_nama')->nullable();
            $table->string('data_pajak_npwp')->nullable();
            $table->text('data_pajak_alamat')->nullable();
            $table->text('data_pajak_alamat2')->nullable();

            // INFO PEMILIK
            $table->string('pemilik_nama')->nullable();
            $table->string('pemilik_no_ktp_sim')->nullable();
            $table->string('pemilik_tempat_lahir')->nullable();
            $table->date('pemilik_tgl_lahir')->nullable();
            $table->text('pemilik_alamat_rumah')->nullable();
            $table->string('pemilik_desa')->nullable();
            $table->string('pemilik_kecamatan')->nullable();
            $table->string('pemilik_kabupaten')->nullable();
            $table->string('pemilik_telepon')->nullable();
            $table->string('pemilik_fax')->nullable();
            $table->string('pemilik_email')->nullable();
            $table->string('pemilik_npwp')->nullable();
            $table->string('pemilik_agama')->nullable();

            // KONTAK SELAIN PEMILIK
            $table->string('kontak_lain_nama')->nullable();
            $table->string('kontak_lain_telepon')->nullable();

            // ACCOUNTING
            $table->string('accounting_nama')->nullable();
            $table->string('accounting_email')->nullable();
            $table->string('accounting_extensi_hp')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mcustomer');
    }
};
