<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nama_panggilan',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat_jalan',
        'kota_kabupaten',
        'provinsi',
        'asal_sekolah',
        'jenjang',
        'kewarganegaraan',
        'anak_ke',
        'jumlah_saudara_kandung',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pendaftaran(): HasOne
    {
        return $this->hasOne(Pendaftaran::class);
    }
}
