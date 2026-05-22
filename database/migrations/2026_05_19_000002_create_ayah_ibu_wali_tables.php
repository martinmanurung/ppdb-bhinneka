<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private function ortuColumns(Blueprint $table): void
    {
        $table->string('nama_lengkap');
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Kong Hu Cu']);
        $table->string('kewarganegaraan')->default('Indonesia');
        $table->string('pendidikan')->nullable();
        $table->string('pekerjaan');
        $table->text('alamat');
        $table->string('no_telp');
        $table->string('nik')->nullable();
        $table->decimal('penghasilan', 15, 2)->nullable();
    }

    public function up(): void
    {
        Schema::create('ayah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');
            $this->ortuColumns($table);
            $table->timestamps();

            $table->unique('pendaftaran_id');
        });

        Schema::create('ibu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');
            $this->ortuColumns($table);
            $table->timestamps();

            $table->unique('pendaftaran_id');
        });

        Schema::create('wali', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');
            $this->ortuColumns($table);
            $table->string('hubungan_kerabat')->nullable();
            $table->timestamps();

            $table->unique('pendaftaran_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wali');
        Schema::dropIfExists('ibu');
        Schema::dropIfExists('ayah');
    }
};
