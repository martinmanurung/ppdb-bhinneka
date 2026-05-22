<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('documents')) {
            return;
        }

        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');
            $table->enum('document_type', ['kk', 'akta', 'ijazah']);
            $table->string('file_path');
            $table->string('file_name');
            $table->integer('file_size');
            $table->string('mime_type');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('verification_notes')->nullable();
            $table->timestamps();

            $table->unique(['pendaftaran_id', 'document_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
