<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'jenis' => ['required', 'string'],
            'judul' => ['required', 'string', 'max:128'],
            'status' => ['required', 'string'],
            'slug' => ['required', 'string', 'max:128'],
        ];
    }
}
