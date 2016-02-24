<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AlimentationRequest extends Request
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
            'libelle_alimentation' => 'required|alpha_spaces|unique:alimentation',
            'description_alimentation' => 'required'
        ];
    }
}
