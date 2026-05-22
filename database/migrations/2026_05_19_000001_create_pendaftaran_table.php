<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pendaftaran')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->enum('status', [
                'Belum Submit',
                'Menunggu Penyerahan Berkas',
                'Terverifikasi',
                'Ditolak',
            ])->default('Belum Submit');
            $table->timestamp('submitted_at')->nullable();
            $table->text('alasan_penolakan')->nullable();
            $table->timestamps();

            $table->unique('student_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
