<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParentProfile extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'parents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'jenis_wali',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'penghasilan' => 'decimal:2',
    ];

    /**
     * Get the student that owns the parent profile.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}

