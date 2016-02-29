<?php

use Illuminate\Database\Eloquent\Model;

class Profession extends Model {

	//
    public function patientProfessions()
    {
        return $this->hasMany('App\models\PatientProfession');
    }
}
