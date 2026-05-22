<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentDataRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    protected function prepareForValidation(): void
    {
        $parents = $this->input('parents', []);

        foreach ([0, 1] as $index) {
            if (empty($parents[$index]['kewarganegaraan'] ?? null)) {
                $parents[$index]['kewarganegaraan'] = 'Indonesia';
            }
        }

        if (! empty($parents[2]['nama_lengkap'] ?? null) && empty($parents[2]['kewarganegaraan'] ?? null)) {
            $parents[2]['kewarganegaraan'] = 'Indonesia';
        }

        $this->merge(['parents' => $parents]);
    }

    public function rules(): array
    {
        $parentFieldRules = [
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before:today'],
            'agama' => ['required', 'in:Islam,Kristen,Katolik,Hindu,Budha,Kong Hu Cu'],
            'kewarganegaraan' => ['required', 'string', 'max:50'],
            'pendidikan' => ['nullable', 'string', 'max:255'],
            'pekerjaan' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'no_telp' => ['required', 'string', 'max:20'],
            'nik' => ['nullable', 'string', 'max:20'],
            'penghasilan' => ['nullable', 'numeric', 'min:0'],
        ];

        $rules = [
            'parents' => ['required', 'array'],
            'parents.0.jenis_wali' => ['required', 'in:Ayah'],
            'parents.1.jenis_wali' => ['required', 'in:Ibu'],
        ];

        foreach ($parentFieldRules as $field => $rule) {
            $rules["parents.0.{$field}"] = $rule;
            $rules["parents.1.{$field}"] = $rule;
        }

        $waliFieldRules = [
            'nama_lengkap' => ['nullable', 'string', 'max:255'],
            'tempat_lahir' => ['required_with:parents.2.nama_lengkap', 'string', 'max:255'],
            'tanggal_lahir' => ['required_with:parents.2.nama_lengkap', 'date', 'before:today'],
            'agama' => ['required_with:parents.2.nama_lengkap', 'in:Islam,Kristen,Katolik,Hindu,Budha,Kong Hu Cu'],
            'kewarganegaraan' => ['required_with:parents.2.nama_lengkap', 'string', 'max:50'],
            'pendidikan' => ['nullable', 'string', 'max:255'],
            'pekerjaan' => ['required_with:parents.2.nama_lengkap', 'string', 'max:255'],
            'alamat' => ['required_with:parents.2.nama_lengkap', 'string'],
            'no_telp' => ['required_with:parents.2.nama_lengkap', 'string', 'max:20'],
            'nik' => ['nullable', 'string', 'max:20'],
            'penghasilan' => ['nullable', 'numeric', 'min:0'],
        ];

        $rules['parents.2.jenis_wali'] = ['nullable', 'in:Wali'];
        foreach ($waliFieldRules as $field => $rule) {
            $rules["parents.2.{$field}"] = $rule;
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'parents.required' => 'Data orang tua/wali harus diisi.',
            'parents.0.nama_lengkap.required' => 'Nama ayah harus diisi.',
            'parents.1.nama_lengkap.required' => 'Nama ibu harus diisi.',
            'parents.0.kewarganegaraan.required' => 'Kewarganegaraan ayah harus diisi.',
            'parents.1.kewarganegaraan.required' => 'Kewarganegaraan ibu harus diisi.',
            'parents.*.tempat_lahir.required' => 'Tempat lahir harus diisi.',
            'parents.*.tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'parents.*.agama.required' => 'Agama harus dipilih.',
            'parents.*.kewarganegaraan.required' => 'Kewarganegaraan harus diisi.',
            'parents.*.pekerjaan.required' => 'Pekerjaan harus diisi.',
            'parents.*.alamat.required' => 'Alamat harus diisi.',
            'parents.*.no_telp.required' => 'Nomor telepon harus diisi.',
            'parents.2.tempat_lahir.required_with' => 'Lengkapi tempat lahir wali jika mengisi data wali.',
            'parents.2.tanggal_lahir.required_with' => 'Lengkapi tanggal lahir wali jika mengisi data wali.',
            'parents.2.agama.required_with' => 'Pilih agama wali jika mengisi data wali.',
            'parents.2.pekerjaan.required_with' => 'Lengkapi pekerjaan wali jika mengisi data wali.',
            'parents.2.alamat.required_with' => 'Lengkapi alamat wali jika mengisi data wali.',
            'parents.2.no_telp.required_with' => 'Lengkapi nomor telepon wali jika mengisi data wali.',
        ];
    }
}
