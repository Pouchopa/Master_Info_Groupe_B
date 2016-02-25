<?php

use Illuminate\Database\Eloquent\Model;

class Activite extends Model {

	//
    public function patient()
    {
        return $this->belongsToMany('App\models\Patient');
    }

}
