<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentUploadRequest;
use App\Models\Document;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function upload(DocumentUploadRequest $request)
    {
        $pendaftaran = Auth::user()->pendaftaran ?? Auth::user()->student?->pendaftaran;

        if (! $pendaftaran) {
            return redirect()->back()->with('error', 'Data pendaftaran tidak ditemukan');
        }

        $file = $request->file('file');
        $documentType = $request->document_type;

        $existingDocument = Document::where('pendaftaran_id', $pendaftaran->id)
            ->where('document_type', $documentType)
            ->first();

        if ($existingDocument) {
            Storage::disk('public')->delete($existingDocument->file_path);
            $existingDocument->delete();
        }

        $path = $file->store("documents/{$pendaftaran->id}/{$documentType}", 'public');

        Document::create([
            'pendaftaran_id' => $pendaftaran->id,
            'document_type' => $documentType,
            'file_path' => $path,
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'mime_type' => $file->getClientMimeType(),
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Dokumen berhasil diunggah');
    }

    public function download($documentId)
    {
        $document = Document::with('pendaftaran.user')->findOrFail($documentId);

        if (Auth::id() !== $document->pendaftaran->user_id && ! Auth::user()?->isAdmin()) {
            abort(403);
        }

        return response()->download(Storage::disk('public')->path($document->file_path), $document->file_name);
    }

    public function delete($documentId)
    {
        $document = Document::with('pendaftaran')->findOrFail($documentId);

        if (Auth::id() !== $document->pendaftaran->user_id) {
            abort(403);
        }

        if ($document->pendaftaran->status === Pendaftaran::STATUS_TERVERIFIKASI) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus dokumen setelah terverifikasi');
        }

        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus');
    }
}
