<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan')->nullable();
            $table->string('nisn')->nullable()->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Kong Hu Cu']);
            $table->string('alamat_jalan');
            $table->string('kota_kabupaten');
            $table->string('provinsi');
            $table->string('asal_sekolah');
            $table->enum('jenjang', ['TK', 'SD', 'SMP'])->nullable();
            $table->string('kewarganegaraan')->default('Indonesia');
            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_saudara_kandung')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
