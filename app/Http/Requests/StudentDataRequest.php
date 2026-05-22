<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nama_panggilan' => ['nullable', 'string', 'max:255'],
            'nisn' => ['nullable', 'string', 'max:20', 'unique:students,nisn'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before:today'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'agama' => ['required', 'in:Islam,Kristen,Katolik,Hindu,Budha,Kong Hu Cu'],
            'jenjang' => ['required', 'in:TK,SD,SMP'],
            'alamat_jalan' => ['required', 'string', 'max:255'],
            'kota_kabupaten' => ['required', 'string', 'max:255'],
            'provinsi' => ['required', 'string', 'max:255'],
            'asal_sekolah' => ['required', 'string', 'max:255'],
            'kewarganegaraan' => ['required', 'string', 'max:50'],
            'anak_ke' => ['nullable', 'integer', 'min:1'],
            'jumlah_saudara_kandung' => ['nullable', 'integer', 'min:0'],
        ];
    }

    /**
     * Get custom error messages.
     */
    public function messages(): array
    {
        return [
            'nama_lengkap.required' => 'Nama lengkap harus diisi',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'tanggal_lahir.before' => 'Tanggal lahir harus sebelum hari ini',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih',
            'agama.required' => 'Agama harus dipilih',
            'alamat_jalan.required' => 'Alamat jalan harus diisi',
            'kota_kabupaten.required' => 'Kota/Kabupaten harus diisi',
            'provinsi.required' => 'Provinsi harus diisi',
            'asal_sekolah.required' => 'Asal sekolah harus diisi',
            'jenjang.required' => 'Jenjang pendidikan harus dipilih',
            'jenjang.in' => 'Pilihan jenjang tidak valid',
        ];
    }
}
