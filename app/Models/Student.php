<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\ParentProfile;

class Student extends Model
{
    public const STATUS_BELUM_SUBMIT = 'Belum Submit';

    public const STATUS_MENUNGGU_BERKAS = 'Menunggu Penyerahan Berkas';

    public const STATUS_TERVERIFIKASI = 'Terverifikasi';

    public const STATUS_DITOLAK = 'Ditolak';

    public const STATUSES = [
        self::STATUS_BELUM_SUBMIT => 'Belum Submit',
        self::STATUS_MENUNGGU_BERKAS => 'Menunggu Penyerahan Berkas',
        self::STATUS_TERVERIFIKASI => 'Terverifikasi',
        self::STATUS_DITOLAK => 'Ditolak',
    ];

    public const REQUIRED_PHYSICAL_DOCUMENTS = [
        'kk' => 'Kartu Keluarga (KK)',
        'akta' => 'Akta Kelahiran',
        'ijazah' => 'Ijazah / Surat Keterangan Lulus (SKL)',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
        'status_verifikasi',
        'submitted_at',
        'alasan_penolakan',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'submitted_at' => 'datetime',
    ];

    /**
     * Get the user that owns the student.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the parent profiles for the student.
     */
    public function parents(): HasMany
    {
        return $this->hasMany(ParentProfile::class);
    }

    /**
     * Get the father/bapak parent profile.
     */
    public function father()
    {
        return $this->parents()->where('jenis_wali', 'Ayah')->first();
    }

    /**
     * Get the mother/ibu parent profile.
     */
    public function mother()
    {
        return $this->parents()->where('jenis_wali', 'Ibu')->first();
    }

    /**
     * Get the alternative parent profile (wali).
     */
    public function wali()
    {
        return $this->parents()->where('jenis_wali', 'Wali')->first();
    }

    /**
     * Get all documents for the student.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function isFormComplete(): bool
    {
        return $this->father() !== null && $this->mother() !== null;
    }

    public function hasSubmittedOnline(): bool
    {
        return $this->submitted_at !== null;
    }

    public function canEditForms(): bool
    {
        return in_array($this->status_verifikasi, [
            self::STATUS_BELUM_SUBMIT,
            self::STATUS_DITOLAK,
        ], true);
    }

    public function isVerified(): bool
    {
        return $this->status_verifikasi === self::STATUS_TERVERIFIKASI;
    }
}

