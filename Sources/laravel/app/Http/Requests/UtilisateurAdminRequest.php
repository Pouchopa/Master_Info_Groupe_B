<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UtilisateurAdminRequest extends Request
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
            'pseudo' => 'required|alpha|between:5,20|unique:utilisateur_admin',
            'mot_de_passe' => 'required|alpha_num|min:5',
            'nom' => 'required|alpha_dash|min:2',
            'prenom' => 'required|alpha_dash',
            'email' => 'required|email|unique:utilisateur_patient'
        ];
    }
}
