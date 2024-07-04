<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required','email', 'min:5'],
            'password' => ["required", 'min:5']
        ];
    }

   /* public function messages()
    {
        return [
            'email.required' => 'Le mail est requis',
            'email.email' => 'Mauvais format de l\'email',
            'password.required' => 'Le mot de passe est requis'
        ];
    } */
}
