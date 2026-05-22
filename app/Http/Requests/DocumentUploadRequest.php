<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentUploadRequest extends FormRequest
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
            'document_type' => ['required', 'in:kk,akta,ijazah'],
            'file' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:2048', // 2MB
            ],
        ];
    }

    /**
     * Get custom error messages.
     */
    public function messages(): array
    {
        return [
            'document_type.required' => 'Jenis dokumen harus dipilih',
            'document_type.in' => 'Jenis dokumen tidak valid',
            'file.required' => 'File harus diunggah',
            'file.file' => 'File tidak valid',
            'file.mimes' => 'File harus berformat PDF, JPG, JPEG, atau PNG',
            'file.max' => 'Ukuran file maksimal 2MB',
        ];
    }
}
