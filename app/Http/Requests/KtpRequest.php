<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KtpRequest extends FormRequest
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
            'nik' => ['required', 'string', 'max:16'],
            'nama' => ['required', 'string', 'max:128'],
            'jenis_kelamin' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string', 'max:128'],
            'tanggal_lahir' => ['required'],
            'verified' => ['required'],
        ];
    }
}
