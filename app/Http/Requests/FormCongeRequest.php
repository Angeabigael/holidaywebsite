<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCongeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'reason' => ['required', 'string', 'min:4'],
            'leave-period' => ['required','integer' ],
            'start-date' => ['required', 'date'],
            'end-date' => ['required', 'date'],
            'leave-type' => ['required','string']
        ];
    }
}