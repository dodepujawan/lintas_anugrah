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
        Schema::create('driver', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique(); // KODE driver (unik)
            $table->string('nama'); // NAMA driver
            $table->text('alamat')->nullable(); // ALAMAT (opsional)
            $table->string('phone')->nullable(); // PHONE (opsional)
            $table->date('mulai_kerja')->nullable(); // MULAI KERJA (tanggal)
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver');
    }
};
