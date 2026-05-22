<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Legacy migration — status pendaftaran kini di tabel pendaftaran.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('students', 'status_verifikasi')) {
            return;
        }
    }

    public function down(): void
    {
        //
    }
};
