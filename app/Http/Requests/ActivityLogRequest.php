<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityLogRequest extends FormRequest
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
            "nama_aktivitas" => ['required', 'string'],
            'class' => ['required', 'string'],
            "function" => ['required', 'string', 'max:64'],
            "input" => ['required', 'string', 'max:64'],
            "output" => ['required', 'string', 'max:64']
        ];
    }
}
