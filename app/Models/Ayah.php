<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ayah extends Model
{
    protected $table = 'ayah';

    protected $fillable = [
        'pendaftaran_id',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'kewarganegaraan',
        'pendidikan',
        'pekerjaan',
        'alamat',
        'no_telp',
        'nik',
        'penghasilan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'penghasilan' => 'decimal:2',
    ];

    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
