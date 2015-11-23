<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OperationRequest extends Request
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
            'libelle_operation' => 'required|alpha_dash|unique:operation',
            'description_operation' => 'required'
        ];
    }
}
