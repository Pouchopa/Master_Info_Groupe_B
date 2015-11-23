<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DouleurRequest extends Request
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
            'intensite_douleur' => 'required',
            'position_douleur' => 'required',
            'evolution_douleur' => 'required'
        ];
    }
}
