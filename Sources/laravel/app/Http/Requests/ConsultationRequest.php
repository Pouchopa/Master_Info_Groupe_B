<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ConsultationRequest extends Request
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
            'date_consultation' => 'required|date_format(\'DD/MM/YYYY\')',
            'type_consultation' => 'required',
            'duree' => 'required|int',
            'commentaire_kine' => 'required',
            'commentaire_patient' => 'required',            
        ];
    }
}