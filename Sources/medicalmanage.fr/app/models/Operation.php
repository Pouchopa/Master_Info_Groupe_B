<?php

use Illuminate\Database\Eloquent\Model;

class Operation extends Model {

	//
    public function patientOperations()
    {
        return $this->hasMany('App\models\PatientOperation');
    }
}
