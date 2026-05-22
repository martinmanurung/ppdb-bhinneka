<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'submitted' => Student::whereNotNull('submitted_at')->count(),
            'verified' => Student::where('status_verifikasi', Student::STATUS_TERVERIFIKASI)->count(),
            'rejected' => Student::where('status_verifikasi', Student::STATUS_DITOLAK)->count(),
            'waiting_documents' => Student::where('status_verifikasi', Student::STATUS_MENUNGGU_BERKAS)->count(),
            'draft' => Student::where('status_verifikasi', Student::STATUS_BELUM_SUBMIT)->count(),
        ];

        $recentApplicants = Student::with('user')
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
        $query = Student::with('user')
            ->whereNotNull('submitted_at');

        if ($request->status) {
            $query->where('status_verifikasi', $request->status);
        }

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_lengkap', 'like', "%{$request->search}%")
                    ->orWhereHas('user', function ($u) use ($request) {
                        $u->where('email', 'like', "%{$request->search}%");
                    });
            });
        }

        $applicants = $query->latest('submitted_at')->paginate(15);

        return view('admin.applicants.index', [
            'applicants' => $applicants,
            'statuses' => Student::STATUSES,
        ]);
    }

    public function showApplicant(Student $student)
    {
        $student->load('user', 'parents');

        return view('admin.applicants.show', [
            'student' => $student,
            'requiredDocuments' => Student::REQUIRED_PHYSICAL_DOCUMENTS,
        ]);
    }

    public function printForm(Student $student)
    {
        $student->load('user', 'parents');

        return view('admin.applicants.print', [
            'student' => $student,
        ]);
    }

    public function updateVerificationStatus(Request $request, Student $student)
    {
        $validated = $request->validate([
            'status_verifikasi' => ['required', 'in:' . implode(',', array_keys(Student::STATUSES))],
            'alasan_penolakan' => ['nullable', 'string', 'max:1000'],
        ]);

        if ($validated['status_verifikasi'] === Student::STATUS_DITOLAK && empty($validated['alasan_penolakan'])) {
            return redirect()->back()
                ->withErrors(['alasan_penolakan' => 'Alasan penolakan wajib diisi jika status Ditolak.'])
                ->withInput();
        }

        if ($validated['status_verifikasi'] !== Student::STATUS_DITOLAK) {
            $validated['alasan_penolakan'] = null;
        }

        $student->update($validated);

        return redirect()->back()
            ->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function exportForm()
    {
        return view('admin.export', [
            'statuses' => Student::STATUSES,
            'exportableCount' => Student::whereNotNull('submitted_at')->count(),
            'verifiedCount' => Student::where('status_verifikasi', Student::STATUS_TERVERIFIKASI)->count(),
        ]);
    }

    public function export(Request $request)
    {
        $query = Student::with('user', 'parents')
            ->whereNotNull('submitted_at');

        if ($request->status) {
            $query->where('status_verifikasi', $request->status);
        }

        $students = $query->orderBy('submitted_at')->get();

        $filename = 'ppdb_pendaftar_' . now()->format('Y-m-d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($students) {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($file, [
                'No',
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

            foreach ($students as $index => $student) {
                fputcsv($file, [
                    $index + 1,
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
                    $student->user->email,
                    $student->user->whatsapp,
                    $student->father()?->nama_lengkap,
                    $student->mother()?->nama_lengkap,
                    $student->wali()?->nama_lengkap,
                    $student->status_verifikasi,
                    $student->submitted_at?->format('d/m/Y H:i'),
                    $student->created_at->format('d/m/Y H:i'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
