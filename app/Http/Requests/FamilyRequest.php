<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Cambia esto según las reglas de autorización de tu aplicación
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Reglas de validación para el tutor
        $tutorRules = [
            'name' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Asegura que sea una imagen y no exceda 2MB
        ];

        // Reglas de validación para el niño (children)
        $childrenRules = [
            'name' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Asegura que sea una imagen y no exceda 2MB
            'gender' => 'required|string|max:10',
            'height' => 'required|integer',
            'weight' => 'required|integer',
            'description' => 'nullable|string',
        ];

        // Combinar y devolver ambas reglas de validación
        return array_merge($tutorRules, $childrenRules);
    }
}
