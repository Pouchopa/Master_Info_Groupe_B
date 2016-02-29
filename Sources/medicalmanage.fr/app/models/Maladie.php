<?php

use Illuminate\Database\Eloquent\Model;

class Maladie extends Model {

	//
    public function patientMaladies()
    {
        return $this->hasMany('App\models\PatientMaladie');
    }

}
