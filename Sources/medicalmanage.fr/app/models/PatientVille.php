<?php

use Illuminate\Database\Eloquent\Model;

class PatientVille extends Model {

	//

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }

    public function ville()
    {
        return $this->belongsTo('App\models\Ville');
    }
}
