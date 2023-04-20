<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganisasiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:128'],
            'nama_singkat' => ['required', 'string', 'max:16'],
            'alamat' => ['required', 'string', 'max:256'],
            'deskripsi' => ['required', 'string'],
        ];
    }
}
