<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormSchoolRequest extends FormRequest
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
            'code' => 'required|string',
            'statut' => 'required|string',
            'name' => 'required|string',
            'abrege' => 'nullable|string',
            'code_postal' => 'nullable|string',
            'email' => 'required|email',
            'address' => 'nullable|nullable',
            'telephon' => 'required|numeric',
            'city' => 'required|string',
            'dren' => 'required|string',
            'descriptif' => 'nullable|string',
            'avatar' => 'nullable|max:2000',
            'actif' => 'nullable|numeric'
        ];
    }
}
