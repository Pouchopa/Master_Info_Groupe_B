<?php

use Illuminate\Database\Eloquent\Model;

class PatientMaladie extends Model {

	//

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }

    public function maladie()
    {
        return $this->belongsTo('App\models\Maladie');
    }


}
