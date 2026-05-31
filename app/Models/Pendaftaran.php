<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pendaftaran extends Model
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

    /** @var list<array{letter: string, label: string, note?: string}> */
    public const REQUIRED_PHYSICAL_DOCUMENTS = [
        [
            'letter' => 'a',
            'label' => 'Foto copy Akta kelahiran calon siswa',
            'note' => '2 lembar',
        ],
        [
            'letter' => 'b',
            'label' => 'Foto copy Kartu Keluarga',
            'note' => '2 lembar',
        ],
        [
            'letter' => 'c',
            'label' => 'Foto copy KTP Orang Tua/Wali (Bapak dan Ibu)',
            'note' => '2 lembar',
        ],
        [
            'letter' => 'd',
            'label' => 'Foto copy SKTB TK',
            'note' => '2 lembar — khusus untuk masuk SD kelas I',
        ],
        [
            'letter' => 'e',
            'label' => 'Foto calon siswa ukuran 3×4',
            'note' => '2 lembar — setelah diberikan seragam sekolah',
        ],
        [
            'letter' => 'f',
            'label' => 'Surat pernyataan kesediaan mengikuti segala peraturan dan ketentuan sekolah yang telah ditandatangani',
            'note' => 'Bermeterai Rp10.000',
        ],
        [
            'letter' => 'g',
            'label' => 'Surat pernyataan biaya yang ditandatangani',
            'note' => 'Bermeterai Rp10.000',
        ],
    ];

    protected $table = 'pendaftaran';

    protected $fillable = [
        'nomor_pendaftaran',
        'user_id',
        'student_id',
        'status',
        'submitted_at',
        'alasan_penolakan',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (Pendaftaran $pendaftaran) {
            if (empty($pendaftaran->nomor_pendaftaran)) {
                $pendaftaran->nomor_pendaftaran = static::generateNomorPendaftaran();
            }
        });
    }

    public static function generateNomorPendaftaran(): string
    {
        $year = now()->year;
        $sequence = static::whereYear('created_at', $year)->count() + 1;

        return sprintf('PPDB-%d-%05d', $year, $sequence);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function ayah(): HasOne
    {
        return $this->hasOne(Ayah::class);
    }

    public function ibu(): HasOne
    {
        return $this->hasOne(Ibu::class);
    }

    public function wali(): HasOne
    {
        return $this->hasOne(Wali::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function isFormComplete(): bool
    {
        return $this->ayah()->exists() && $this->ibu()->exists();
    }

    public function hasSubmittedOnline(): bool
    {
        return $this->submitted_at !== null;
    }

    public function canEditForms(): bool
    {
        return in_array($this->status, [
            self::STATUS_BELUM_SUBMIT,
            self::STATUS_DITOLAK,
        ], true);
    }

    public function isVerified(): bool
    {
        return $this->status === self::STATUS_TERVERIFIKASI;
    }
}
