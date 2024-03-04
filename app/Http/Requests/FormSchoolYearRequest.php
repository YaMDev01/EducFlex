<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormSchoolYearRequest extends FormRequest
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
            'school_year' => 'required|string|unique:school_years,school_year',
            'session' => 'required|integer|min:1',
            'cycle1' => 'nullable|integer',
            'cycle2' => 'nullable|integer',
            'actif' => 'nullable|integer'
        ];
    }
}
