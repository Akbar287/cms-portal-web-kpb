<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HubungiRequest extends FormRequest
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
            'alamat' => ['required', 'string', 'max:128'],
            'telepon' => ['required', 'string', 'max:16'],
            'no_hp' => ['required', 'string', 'max:16'],
            'no_wa' => ['required', 'string', 'max:16'],
            'email' => ['required', 'string', 'email', 'max:128'],
        ];
    }
}
