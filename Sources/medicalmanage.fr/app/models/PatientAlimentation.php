<?php

use Illuminate\Database\Eloquent\Model;

class PatientAlimentation extends Model {

	//

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }

    public function alimentation()
    {
        return $this->belongsTo('App\models\Alimentation');
    }

}
