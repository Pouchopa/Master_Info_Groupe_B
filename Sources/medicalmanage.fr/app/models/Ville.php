<?php

use Illuminate\Database\Eloquent\Model;

class Ville extends Model {

	//
    public function patientVilles()
    {
        return $this->hasMany('App\models\PatientVille');
    }

}
