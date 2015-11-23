<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UtilisateurpatientRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pseudo' => 'required|alpha|between:5,20|unique:utilisateur_patient',
            'mot_de_passe' => 'required|min:5|alpha_num',
            'nom' => 'required|alpha_dash|min:2',
            'prenom' => 'required|alpha_dash',
            'sexe' => 'required',
            'date_naissance' => 'required|date_format(\'DD/MM/YYY\')',
            'email' => 'required|email|unique:utilisateur_patient',
            'situation_familiale' => 'required'
        ];
    }
}
