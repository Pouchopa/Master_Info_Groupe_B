<?php

use Illuminate\Database\Eloquent\Model;

class PatientProfession extends Model {

	//


    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }

    public function profession()
    {
        return $this->belongsTo('App\models\Profession');
    }
}
