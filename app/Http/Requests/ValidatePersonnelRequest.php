<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePersonnelRequest extends FormRequest
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
            'matricule' => ['required', 'numeric', 'min:8'],
            'nom' => ['required', 'string'],
            'prenom' => ['required', 'string'],
            'corps' => ['required', 'string'],
            'structure' => ['required', 'string']
        ];
    }
}
