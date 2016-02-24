<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UtilisateurPatientUpdateRequest extends Request
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
        $id = $this->segment(2);

        return [
            'nom' => 'required|alpha_dash|min:2, nom,' . $id,
            'prenom' => 'required|alpha_dash|min:2, prenom,' . $id,
            'email' => 'required|email|max:255|unique:utilisateur_patient,email,' . $id,
            'sexe' => 'required|min:1, sexe,' . $id,
            'date_naissance' => 'required|min:10, date, date_naissance,' . $id,
            'taux_de_graisse' => 'between:0,100, taux_de_graisse' . $id,
            'taux_de_muscle' => 'between:0,100,taux_de_muscle,' . $id,
            'masse_osseuse' => 'min:0, masse_osseuse,' . $id,
            'heures_travaillees' => 'min:0, heures_travaillees,' . $id,
            'nbr_enfants' => 'min:0, nbr_enfants,' . $id
        ];
    }
}
