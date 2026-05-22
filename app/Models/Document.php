<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pendaftaran_id',
        'document_type',
        'file_path',
        'file_name',
        'file_size',
        'mime_type',
        'status',
        'verification_notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'file_size' => 'integer',
    ];

    /**
     * Document types available
     */
    public const TYPES = [
        'kk' => 'Kartu Keluarga',
        'akta' => 'Akta Kelahiran',
        'ijazah' => 'Ijazah / Surat Keterangan Lulus',
    ];

    /**
     * Statuses available
     */
    public const STATUSES = [
        'pending' => 'Pending',
        'approved' => 'Disetujui',
        'rejected' => 'Ditolak',
    ];

    /**
     * Get the student that owns the document.
     */
    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    /**
     * Check if document is approved
     */
    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    /**
     * Check if document is rejected
     */
    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    /**
     * Check if document is pending
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Get the human-readable document type
     */
    public function getDocumentTypeLabel(): string
    {
        return self::TYPES[$this->document_type] ?? $this->document_type;
    }

    /**
     * Get the human-readable status
     */
    public function getStatusLabel(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }
}
