<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'submitted' => Pendaftaran::whereNotNull('submitted_at')->count(),
            'verified' => Pendaftaran::where('status', Pendaftaran::STATUS_TERVERIFIKASI)->count(),
            'rejected' => Pendaftaran::where('status', Pendaftaran::STATUS_DITOLAK)->count(),
            'waiting_documents' => Pendaftaran::where('status', Pendaftaran::STATUS_MENUNGGU_BERKAS)->count(),
            'draft' => Pendaftaran::where('status', Pendaftaran::STATUS_BELUM_SUBMIT)->count(),
        ];

        $recentApplicants = Pendaftaran::with(['user', 'student'])
            ->whereNotNull('submitted_at')
            ->latest('submitted_at')
            ->take(10)
            ->get();

        return view('admin.dashboard', [
            'stats' => $stats,
            'recentApplicants' => $recentApplicants,
        ]);
    }

    public function applicants(Request $request)
    {
        $query = Pendaftaran::with(['user', 'student'])
            ->whereNotNull('submitted_at');

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nomor_pendaftaran', 'like', "%{$request->search}%")
                    ->orWhereHas('student', function ($s) use ($request) {
                        $s->where('nama_lengkap', 'like', "%{$request->search}%");
                    })
                    ->orWhereHas('user', function ($u) use ($request) {
                        $u->where('email', 'like', "%{$request->search}%");
                    });
            });
        }

        $applicants = $query->latest('submitted_at')->paginate(15);

        return view('admin.applicants.index', [
            'applicants' => $applicants,
            'statuses' => Pendaftaran::STATUSES,
        ]);
    }

    public function showApplicant(Pendaftaran $pendaftaran)
    {
        $pendaftaran->load(['user', 'student', 'ayah', 'ibu', 'wali']);

        return view('admin.applicants.show', [
            'pendaftaran' => $pendaftaran,
            'requiredDocuments' => Pendaftaran::REQUIRED_PHYSICAL_DOCUMENTS,
        ]);
    }

    public function printForm(Pendaftaran $pendaftaran)
    {
        $pendaftaran->load(['user', 'student', 'ayah', 'ibu', 'wali']);

        return view('admin.applicants.print', [
            'pendaftaran' => $pendaftaran,
        ]);
    }

    public function updateVerificationStatus(Request $request, Pendaftaran $pendaftaran)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:' . implode(',', array_keys(Pendaftaran::STATUSES))],
            'alasan_penolakan' => ['nullable', 'string', 'max:1000'],
        ]);

        if ($validated['status'] === Pendaftaran::STATUS_DITOLAK && empty($validated['alasan_penolakan'])) {
            return redirect()->back()
                ->withErrors(['alasan_penolakan' => 'Alasan penolakan wajib diisi jika status Ditolak.'])
                ->withInput();
        }

        if ($validated['status'] !== Pendaftaran::STATUS_DITOLAK) {
            $validated['alasan_penolakan'] = null;
        }

        $pendaftaran->update($validated);

        return redirect()->back()
            ->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function exportForm()
    {
        return view('admin.export', [
            'statuses' => Pendaftaran::STATUSES,
            'exportableCount' => Pendaftaran::whereNotNull('submitted_at')->count(),
            'verifiedCount' => Pendaftaran::where('status', Pendaftaran::STATUS_TERVERIFIKASI)->count(),
        ]);
    }

    public function export(Request $request)
    {
        $query = Pendaftaran::with(['user', 'student', 'ayah', 'ibu', 'wali'])
            ->whereNotNull('submitted_at');

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $rows = $query->orderBy('submitted_at')->get();

        $filename = 'ppdb_pendaftar_' . now()->format('Y-m-d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($rows) {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($file, [
                'No',
                'Nomor Pendaftaran',
                'Nama Lengkap',
                'Nama Panggilan',
                'NISN',
                'Jenjang',
                'Jenis Kelamin',
                'Tempat Lahir',
                'Tanggal Lahir',
                'Agama',
                'Alamat',
                'Kota/Kabupaten',
                'Provinsi',
                'Asal Sekolah',
                'Email',
                'WhatsApp',
                'Nama Ayah',
                'Nama Ibu',
                'Nama Wali',
                'Status',
                'Tanggal Submit Online',
                'Tanggal Terdaftar',
            ]);

            foreach ($rows as $index => $pendaftaran) {
                $student = $pendaftaran->student;
                fputcsv($file, [
                    $index + 1,
                    $pendaftaran->nomor_pendaftaran,
                    $student->nama_lengkap,
                    $student->nama_panggilan,
                    $student->nisn,
                    $student->jenjang,
                    $student->jenis_kelamin,
                    $student->tempat_lahir,
                    $student->tanggal_lahir?->format('d/m/Y'),
                    $student->agama,
                    $student->alamat_jalan,
                    $student->kota_kabupaten,
                    $student->provinsi,
                    $student->asal_sekolah,
                    $pendaftaran->user->email,
                    $pendaftaran->user->whatsapp,
                    $pendaftaran->ayah?->nama_lengkap,
                    $pendaftaran->ibu?->nama_lengkap,
                    $pendaftaran->wali?->nama_lengkap,
                    $pendaftaran->status,
                    $pendaftaran->submitted_at?->format('d/m/Y H:i'),
                    $pendaftaran->created_at->format('d/m/Y H:i'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
