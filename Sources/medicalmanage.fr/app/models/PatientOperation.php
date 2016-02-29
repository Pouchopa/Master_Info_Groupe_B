<?php

use Illuminate\Database\Eloquent\Model;

class PatientOperation extends Model {

	//

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }

    public function operation()
    {
        return $this->belongsTo('App\models\Operation');
    }

}
