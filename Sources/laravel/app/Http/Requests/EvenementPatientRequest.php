<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EvenementPatientRequest extends Request
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
            'date_evenement' => 'required',
            'patient_id' => 'required',
            'evenement_id' => 'required'
        ];
    }
}
