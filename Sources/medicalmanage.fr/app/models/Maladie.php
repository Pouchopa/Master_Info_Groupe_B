<?php

use Illuminate\Database\Eloquent\Model;

class Maladie extends Model {

	//
    public function patient()
    {
        return $this->belongsToMany('App\Patient');
    }

}
