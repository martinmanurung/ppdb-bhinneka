<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('students', 'submitted_at')) {
            Schema::table('students', function (Blueprint $table) {
                $table->timestamp('submitted_at')->nullable()->after('status_verifikasi');
            });
        }

        if (Schema::hasColumn('students', 'status_verifikasi')) {
            if (Schema::getConnection()->getDriverName() === 'mysql') {
                DB::statement("ALTER TABLE students MODIFY COLUMN status_verifikasi ENUM('Belum Diverifikasi', 'Belum Submit', 'Menunggu Penyerahan Berkas', 'Terverifikasi', 'Ditolak') NOT NULL DEFAULT 'Belum Submit'");
            }

            DB::table('students')->where('status_verifikasi', 'Belum Diverifikasi')->update([
                'status_verifikasi' => 'Belum Submit',
            ]);

            if (Schema::getConnection()->getDriverName() === 'mysql') {
                DB::statement("ALTER TABLE students MODIFY COLUMN status_verifikasi ENUM('Belum Submit', 'Menunggu Penyerahan Berkas', 'Terverifikasi', 'Ditolak') NOT NULL DEFAULT 'Belum Submit'");
            }
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('students', 'status_verifikasi')) {
            if (Schema::getConnection()->getDriverName() === 'mysql') {
                DB::statement("ALTER TABLE students MODIFY COLUMN status_verifikasi ENUM('Belum Diverifikasi', 'Belum Submit', 'Menunggu Penyerahan Berkas', 'Terverifikasi', 'Ditolak') NOT NULL DEFAULT 'Belum Diverifikasi'");
            }

            DB::table('students')->where('status_verifikasi', 'Belum Submit')->update([
                'status_verifikasi' => 'Belum Diverifikasi',
            ]);

            DB::table('students')->where('status_verifikasi', 'Menunggu Penyerahan Berkas')->update([
                'status_verifikasi' => 'Belum Diverifikasi',
            ]);

            if (Schema::getConnection()->getDriverName() === 'mysql') {
                DB::statement("ALTER TABLE students MODIFY COLUMN status_verifikasi ENUM('Belum Diverifikasi', 'Terverifikasi', 'Ditolak') NOT NULL DEFAULT 'Belum Diverifikasi'");
            }
        }

    }
};
