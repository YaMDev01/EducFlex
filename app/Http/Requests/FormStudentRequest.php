<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormStudentRequest extends FormRequest
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
            'matricule' => 'required|string|unique:students,matricule',
            'affecte' => 'required|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'genre' => 'required|string',
            'date_nais' => 'required|string',
            'lieu_nais' => 'required|string',
            'lieu_residence' => 'required|string',
            'etablissement_origine' => 'required|string',
            'interne' => 'required|string',
            'level_id' => 'required|integer|max:1',
            'boursier' => 'required|string',
            'redoublant' => 'required|string',
            'avatar' => 'nullable|max:2000',
            'nom_prenom_pere' => 'nullable|string',
            'profession_pere' => 'nullable|string',
            'contact_pere' => 'nullable|numeric',
            'nom_prenom_mere' => 'nullable|string',
            'profession_mere' => 'nullable|string',
            'contact_mere' => 'nullable|numeric',
            'nom_prenom_tuteur' => 'nullable|string',
            'profession_tuteur' => 'nullable|string',
            'contact_tuteur' => 'nullable|numeric',
            'level_id' => 'required|integer',
            'nationality_id' => 'required|integer',
            'actif' => 'nullable|integer|max:1'
        ];
    }
}
