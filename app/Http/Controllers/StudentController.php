<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentDataRequest;
use App\Http\Requests\ParentDataRequest;
use App\Models\Student;
use App\Models\ParentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $student = $user->student;

        return view('student.dashboard', [
            'student' => $student,
            'registrationProgress' => $this->getRegistrationProgress($student),
        ]);
    }

    public function showBiodataForm()
    {
        $user = Auth::user();
        $student = $user->student;

        if ($student && ! $student->canEditForms()) {
            return redirect()->route('student.dashboard')
                ->with('error', 'Formulir tidak dapat diubah setelah dikirim. Hubungi sekolah jika ada koreksi.');
        }

        $student = $student ?? new Student();

        return view('student.forms.biodata', ['student' => $student]);
    }

    public function storeBiodata(StudentDataRequest $request)
    {
        $user = Auth::user();
        $student = $user->student;

        if ($student && ! $student->canEditForms()) {
            return redirect()->route('student.dashboard')
                ->with('error', 'Formulir tidak dapat diubah setelah dikirim.');
        }

        $student = $student ?? new Student(['user_id' => $user->id]);
        $student->fill($request->validated());

        if (! $student->status_verifikasi) {
            $student->status_verifikasi = Student::STATUS_BELUM_SUBMIT;
        }

        $student->save();

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

        if (! $student->canEditForms()) {
            return redirect()->route('student.dashboard')
                ->with('error', 'Formulir tidak dapat diubah setelah dikirim.');
        }

        return view('student.forms.parents', [
            'student' => $student,
            'ayah' => $student->father(),
            'ibu' => $student->mother(),
            'wali' => $student->wali(),
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

        if (! $student->canEditForms()) {
            return redirect()->route('student.dashboard')
                ->with('error', 'Formulir tidak dapat diubah setelah dikirim.');
        }

        $student->parents()->delete();

        foreach ($request->parents as $parentData) {
            if (($parentData['jenis_wali'] ?? '') === 'Wali' && blank($parentData['nama_lengkap'] ?? null)) {
                continue;
            }

            ParentProfile::create(array_merge(
                $parentData,
                ['student_id' => $student->id]
            ));
        }

        return redirect()->route('student.form.konfirmasi')
            ->with('success', 'Data orangtua/wali berhasil disimpan!');
    }

    public function showKonfirmasiForm()
    {
        $user = Auth::user();
        $student = $user->student;

        if (! $student) {
            return redirect()->route('student.form.biodata')
                ->with('error', 'Silakan lengkapi data biodata terlebih dahulu');
        }

        if (! $student->isFormComplete()) {
            return redirect()->route('student.form.parents')
                ->with('error', 'Silakan lengkapi data orangtua/wali terlebih dahulu');
        }

        return view('student.forms.konfirmasi', [
            'student' => $student,
            'requiredDocuments' => Student::REQUIRED_PHYSICAL_DOCUMENTS,
        ]);
    }

    public function submitRegistration(Request $request)
    {
        $user = Auth::user();
        $student = $user->student;

        if (! $student || ! $student->isFormComplete()) {
            return redirect()->route('student.dashboard')
                ->with('error', 'Lengkapi biodata dan data orangtua/wali terlebih dahulu.');
        }

        if ($student->hasSubmittedOnline() && $student->status_verifikasi !== Student::STATUS_DITOLAK) {
            return redirect()->route('student.dashboard')
                ->with('info', 'Formulir pendaftaran Anda sudah dikirim.');
        }

        $request->validate([
            'konfirmasi' => ['accepted'],
        ], [
            'konfirmasi.accepted' => 'Anda harus menyetujui bahwa data yang diisi sudah benar.',
        ]);

        $student->update([
            'status_verifikasi' => Student::STATUS_MENUNGGU_BERKAS,
            'submitted_at' => now(),
            'alasan_penolakan' => null,
        ]);

        return redirect()->route('student.dashboard')
            ->with('success', 'Formulir berhasil dikirim! Silakan datang ke sekolah untuk menyerahkan berkas persyaratan.');
    }

    private function getRegistrationProgress(?Student $student): array
    {
        return [
            'biodata' => $student !== null,
            'parents' => $student !== null && $student->isFormComplete(),
            'submitted' => $student !== null && $student->hasSubmittedOnline(),
            'verified' => $student !== null && $student->isVerified(),
        ];
    }
}
