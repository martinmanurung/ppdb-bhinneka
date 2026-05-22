<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentUploadRequest;
use App\Models\Document;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Upload document
     */
    public function upload(DocumentUploadRequest $request)
    {
        $user = Auth::user();
        $student = $user->student;

        if (!$student) {
            return redirect()->back()
                ->with('error', 'Data siswa tidak ditemukan');
        }

        $file = $request->file('file');
        $documentType = $request->document_type;

        // Delete existing document file if any before replacing it
        $existingDocument = Document::where('student_id', $student->id)
            ->where('document_type', $documentType)
            ->first();

        if ($existingDocument) {
            Storage::disk('public')->delete($existingDocument->file_path);
            $existingDocument->delete();
        }

        // Store file
        $path = $file->store("documents/{$student->id}/{$documentType}", 'public');

        // Create document record
        Document::create([
            'student_id' => $student->id,
            'document_type' => $documentType,
            'file_path' => $path,
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'mime_type' => $file->getClientMimeType(),
            'status' => 'pending',
        ]);

        return redirect()->back()
            ->with('success', 'Dokumen berhasil diunggah dan menunggu verifikasi');
    }

    /**
     * Download document
     */
    public function download($documentId)
    {
        $document = Document::findOrFail($documentId);

        // Check authorization
        if (Auth::id() !== $document->student->user_id && !(Auth::user()?->role === 'admin')) {
            abort(403, 'Unauthorized');
        }

        return response()->download(Storage::disk('public')->path($document->file_path), $document->file_name);
    }

    /**
     * Delete document
     */
    public function delete($documentId)
    {
        $document = Document::findOrFail($documentId);

        // Check authorization
        if (Auth::id() !== $document->student->user_id) {
            abort(403, 'Unauthorized');
        }

        // Only allow deletion if not verified
        if ($document->student->status_verifikasi === 'Terverifikasi') {
            return redirect()->back()
                ->with('error', 'Tidak dapat menghapus dokumen yang sudah terverifikasi');
        }

        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return redirect()->back()
            ->with('success', 'Dokumen berhasil dihapus');
    }
}
