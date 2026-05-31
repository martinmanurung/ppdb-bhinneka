<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParentDataRequest;
use App\Http\Requests\StudentDataRequest;
use App\Models\Pendaftaran;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function showBerkas()
    {
        return view('student.berkas');
    }

    public function downloadSuratPernyataan()
    {
        $path = public_path('surat-pernyataan.pdf');

        if (! file_exists($path)) {
            return redirect()->route('student.dashboard')
                ->with('error', 'File surat pernyataan belum tersedia. Hubungi sekolah.');
        }

        return response()->download($path, 'Surat-Pernyataan-PPDB-Bhinneka.pdf');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $student = $user->student;
        $pendaftaran = $user->pendaftaran ?? $student?->pendaftaran;

        return view('student.dashboard', [
            'student' => $student,
            'pendaftaran' => $pendaftaran,
            'registrationProgress' => $this->getRegistrationProgress($student, $pendaftaran),
        ]);
    }

    public function showBiodataForm()
    {
        $user = Auth::user();
        $student = $user->student;
        $pendaftaran = $user->pendaftaran ?? $student?->pendaftaran;

        if ($pendaftaran && ! $pendaftaran->canEditForms()) {
            return redirect()->route('student.dashboard')
                ->with('error', 'Formulir tidak dapat diubah setelah dikirim. Hubungi sekolah jika ada koreksi.');
        }

        return view('student.forms.biodata', [
            'student' => $student ?? new Student(),
        ]);
    }

    public function storeBiodata(StudentDataRequest $request)
    {
        $user = Auth::user();
        $student = $user->student;
        $pendaftaran = $user->pendaftaran ?? $student?->pendaftaran;

        if ($pendaftaran && ! $pendaftaran->canEditForms()) {
            return redirect()->route('student.dashboard')
                ->with('error', 'Formulir tidak dapat diubah setelah dikirim.');
        }

        $student = $student ?? new Student(['user_id' => $user->id]);
        $student->fill($request->validated());
        $student->save();

        Pendaftaran::firstOrCreate(
            ['student_id' => $student->id],
            [
                'user_id' => $user->id,
                'status' => Pendaftaran::STATUS_BELUM_SUBMIT,
            ]
        );

        return redirect()->route('student.form.parents')
            ->with('success', 'Data biodata berhasil disimpan!');
    }

    public function showParentsForm()
    {
        $user = Auth::user();
        $student = $user->student;

        if (! $student) {
            return redirect()->route('student.form.biodata')
                ->with('error', 'Silakan lengkapi data biodata terlebih dahulu');
        }

        $pendaftaran = $this->resolvePendaftaran($student);

        if (! $pendaftaran->canEditForms()) {
            return redirect()->route('student.dashboard')
                ->with('error', 'Formulir tidak dapat diubah setelah dikirim.');
        }

        $pendaftaran->load(['ayah', 'ibu', 'wali']);

        return view('student.forms.parents', [
            'student' => $student,
            'pendaftaran' => $pendaftaran,
            'ayah' => $pendaftaran->ayah,
            'ibu' => $pendaftaran->ibu,
            'wali' => $pendaftaran->wali,
        ]);
    }

    public function storeParents(ParentDataRequest $request)
    {
        $user = Auth::user();
        $student = $user->student;

        if (! $student) {
            return redirect()->route('student.form.biodata')
                ->with('error', 'Silakan lengkapi data biodata terlebih dahulu');
        }

        $pendaftaran = $this->resolvePendaftaran($student);

        if (! $pendaftaran->canEditForms()) {
            return redirect()->route('student.dashboard')
                ->with('error', 'Formulir tidak dapat diubah setelah dikirim.');
        }

        $pendaftaran->ayah()->updateOrCreate(
            ['pendaftaran_id' => $pendaftaran->id],
            $request->validated()['ayah']
        );

        $pendaftaran->ibu()->updateOrCreate(
            ['pendaftaran_id' => $pendaftaran->id],
            $request->validated()['ibu']
        );

        if (filled(trim($request->input('wali.nama_lengkap', '')))) {
            $pendaftaran->wali()->updateOrCreate(
                ['pendaftaran_id' => $pendaftaran->id],
                $request->validated()['wali']
            );
        } else {
            $pendaftaran->wali()?->delete();
        }

        return redirect()->route('student.form.konfirmasi')
            ->with('success', 'Data orang tua/wali berhasil disimpan!');
    }

    public function showKonfirmasiForm()
    {
        $user = Auth::user();
        $student = $user->student;

        if (! $student) {
            return redirect()->route('student.form.biodata')
                ->with('error', 'Silakan lengkapi data biodata terlebih dahulu');
        }

        $pendaftaran = $this->resolvePendaftaran($student);

        if (! $pendaftaran->isFormComplete()) {
            return redirect()->route('student.form.parents')
                ->with('error', 'Silakan lengkapi data ayah dan ibu terlebih dahulu');
        }

        return view('student.forms.konfirmasi', [
            'student' => $student,
            'pendaftaran' => $pendaftaran,
            'requiredDocuments' => Pendaftaran::REQUIRED_PHYSICAL_DOCUMENTS,
        ]);
    }

    public function submitRegistration(Request $request)
    {
        $user = Auth::user();
        $student = $user->student;

        if (! $student) {
            return redirect()->route('student.dashboard')
                ->with('error', 'Lengkapi biodata terlebih dahulu.');
        }

        $pendaftaran = $this->resolvePendaftaran($student);

        if (! $pendaftaran->isFormComplete()) {
            return redirect()->route('student.dashboard')
                ->with('error', 'Lengkapi biodata dan data orang tua terlebih dahulu.');
        }

        if ($pendaftaran->hasSubmittedOnline() && $pendaftaran->status !== Pendaftaran::STATUS_DITOLAK) {
            return redirect()->route('student.dashboard')
                ->with('info', 'Formulir pendaftaran Anda sudah dikirim.');
        }

        $request->validate([
            'konfirmasi' => ['accepted'],
        ], [
            'konfirmasi.accepted' => 'Anda harus menyetujui bahwa data yang diisi sudah benar.',
        ]);

        $pendaftaran->update([
            'status' => Pendaftaran::STATUS_MENUNGGU_BERKAS,
            'submitted_at' => now(),
            'alasan_penolakan' => null,
        ]);

        return redirect()->route('student.dashboard')
            ->with('success', 'Formulir berhasil dikirim! Silakan datang ke sekolah untuk menyerahkan berkas persyaratan.');
    }

    private function resolvePendaftaran(Student $student): Pendaftaran
    {
        return Pendaftaran::firstOrCreate(
            ['student_id' => $student->id],
            [
                'user_id' => $student->user_id,
                'status' => Pendaftaran::STATUS_BELUM_SUBMIT,
            ]
        );
    }

    private function getRegistrationProgress(?Student $student, ?Pendaftaran $pendaftaran): array
    {
        return [
            'biodata' => $student !== null,
            'parents' => $pendaftaran !== null && $pendaftaran->isFormComplete(),
            'submitted' => $pendaftaran !== null && $pendaftaran->hasSubmittedOnline(),
            'verified' => $pendaftaran !== null && $pendaftaran->isVerified(),
        ];
    }
}
