<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('parents')) {
            return;
        }

        if (! Schema::hasTable('pendaftaran')) {
            return;
        }

        $counter = (int) DB::table('pendaftaran')->count();

        foreach (DB::table('students')->orderBy('id')->get() as $student) {
            $exists = DB::table('pendaftaran')->where('student_id', $student->id)->exists();
            if ($exists) {
                continue;
            }

            $counter++;
            $status = $student->status_verifikasi ?? 'Belum Submit';
            if ($status === 'Belum Diverifikasi') {
                $status = 'Belum Submit';
            }

            DB::table('pendaftaran')->insert([
                'nomor_pendaftaran' => sprintf('PPDB-%s-%05d', now()->year, $counter),
                'user_id' => $student->user_id,
                'student_id' => $student->id,
                'status' => $status,
                'submitted_at' => $student->submitted_at ?? null,
                'alasan_penolakan' => $student->alasan_penolakan ?? null,
                'created_at' => $student->created_at,
                'updated_at' => $student->updated_at,
            ]);
        }

        $map = ['Ayah' => 'ayah', 'Ibu' => 'ibu', 'Wali' => 'wali'];

        foreach (DB::table('parents')->get() as $parent) {
            $pendaftaranId = DB::table('pendaftaran')->where('student_id', $parent->student_id)->value('id');
            if (! $pendaftaranId) {
                continue;
            }

            $table = $map[$parent->jenis_wali] ?? null;
            if (! $table || DB::table($table)->where('pendaftaran_id', $pendaftaranId)->exists()) {
                continue;
            }

            $row = [
                'pendaftaran_id' => $pendaftaranId,
                'nama_lengkap' => $parent->nama_lengkap,
                'tempat_lahir' => $parent->tempat_lahir,
                'tanggal_lahir' => $parent->tanggal_lahir,
                'agama' => $parent->agama,
                'kewarganegaraan' => $parent->kewarganegaraan,
                'pendidikan' => $parent->pendidikan,
                'pekerjaan' => $parent->pekerjaan,
                'alamat' => $parent->alamat,
                'no_telp' => $parent->no_telp,
                'nik' => $parent->nik,
                'penghasilan' => $parent->penghasilan,
                'created_at' => $parent->created_at,
                'updated_at' => $parent->updated_at,
            ];

            if ($table === 'wali') {
                $row['hubungan_kerabat'] = null;
            }

            DB::table($table)->insert($row);
        }

        Schema::dropIfExists('parents');

        if (Schema::hasColumn('students', 'status_verifikasi')) {
            Schema::table('students', function (Blueprint $table) {
                $table->dropColumn(['status_verifikasi', 'submitted_at', 'alasan_penolakan']);
            });
        }

        if (Schema::hasTable('documents') && Schema::hasColumn('documents', 'student_id')) {
            Schema::table('documents', function (Blueprint $table) {
                $table->foreignId('pendaftaran_id')->nullable()->after('id')->constrained('pendaftaran')->onDelete('cascade');
            });

            foreach (DB::table('documents')->get() as $doc) {
                $pendaftaranId = DB::table('pendaftaran')->where('student_id', $doc->student_id)->value('id');
                if ($pendaftaranId) {
                    DB::table('documents')->where('id', $doc->id)->update(['pendaftaran_id' => $pendaftaranId]);
                }
            }

            Schema::table('documents', function (Blueprint $table) {
                $table->dropForeign(['student_id']);
                $table->dropUnique(['student_id', 'document_type']);
                $table->dropColumn('student_id');
            });

            Schema::table('documents', function (Blueprint $table) {
                $table->unique(['pendaftaran_id', 'document_type']);
            });
        }
    }

    public function down(): void
    {
        //
    }
};
