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
        $ayah = $this->input('ayah', []);
        $ibu = $this->input('ibu', []);
        $wali = $this->input('wali', []);

        if (empty($ayah['kewarganegaraan'])) {
            $ayah['kewarganegaraan'] = 'Indonesia';
        }
        if (empty($ibu['kewarganegaraan'])) {
            $ibu['kewarganegaraan'] = 'Indonesia';
        }
        if (! filled(trim($wali['nama_lengkap'] ?? ''))) {
            $wali = [];
        } elseif (empty($wali['kewarganegaraan'])) {
            $wali['kewarganegaraan'] = 'Indonesia';
        }

        $this->merge([
            'ayah' => $ayah,
            'ibu' => $ibu,
            'wali' => $wali,
        ]);
    }

    public function rules(): array
    {
        $ortuRules = [
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
            'ayah' => ['required', 'array'],
            'ibu' => ['required', 'array'],
            'wali' => ['nullable', 'array'],
        ];

        foreach ($ortuRules as $field => $rule) {
            $rules["ayah.{$field}"] = $rule;
            $rules["ibu.{$field}"] = $rule;
        }

        $waliRules = [
            'nama_lengkap' => ['nullable', 'string', 'max:255'],
            'tempat_lahir' => ['nullable', 'required_with:wali.nama_lengkap', 'string', 'max:255'],
            'tanggal_lahir' => ['nullable', 'required_with:wali.nama_lengkap', 'date', 'before:today'],
            'agama' => ['nullable', 'required_with:wali.nama_lengkap', 'in:Islam,Kristen,Katolik,Hindu,Budha,Kong Hu Cu'],
            'kewarganegaraan' => ['nullable', 'required_with:wali.nama_lengkap', 'string', 'max:50'],
            'pendidikan' => ['nullable', 'string', 'max:255'],
            'pekerjaan' => ['nullable', 'required_with:wali.nama_lengkap', 'string', 'max:255'],
            'alamat' => ['nullable', 'required_with:wali.nama_lengkap', 'string'],
            'no_telp' => ['nullable', 'required_with:wali.nama_lengkap', 'string', 'max:20'],
            'nik' => ['nullable', 'string', 'max:20'],
            'penghasilan' => ['nullable', 'numeric', 'min:0'],
            'hubungan_kerabat' => ['nullable', 'string', 'max:100'],
        ];

        foreach ($waliRules as $field => $rule) {
            $rules["wali.{$field}"] = $rule;
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'ayah.nama_lengkap.required' => 'Nama ayah harus diisi.',
            'ibu.nama_lengkap.required' => 'Nama ibu harus diisi.',
            'ayah.kewarganegaraan.required' => 'Kewarganegaraan ayah harus diisi.',
            'ibu.kewarganegaraan.required' => 'Kewarganegaraan ibu harus diisi.',
            'ayah.*.required' => 'Data ayah wajib dilengkapi.',
            'ibu.*.required' => 'Data ibu wajib dilengkapi.',
            'wali.pekerjaan.required_with' => 'Lengkapi pekerjaan wali jika mengisi data wali.',
            'wali.alamat.required_with' => 'Lengkapi alamat wali jika mengisi data wali.',
            'wali.no_telp.required_with' => 'Lengkapi nomor telepon wali jika mengisi data wali.',
        ];
    }
}
