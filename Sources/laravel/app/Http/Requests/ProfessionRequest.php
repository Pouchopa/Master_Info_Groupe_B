<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfessionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'libelle_profession' => 'required|alpha_dash|unique:profession',
            'stress_physique' => 'required|boolean',
            'stress_psychique' => 'required|boolean',            
            'posture_travail' => 'required'
        ];
    }
}
