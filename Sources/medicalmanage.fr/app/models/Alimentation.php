<?php

use Illuminate\Database\Eloquent\Model;

class Alimentation extends Model {

	//


    public function patientAlimentations()
    {
        return $this->hasMany('App\models\PatientAlimentation');
    }

}
