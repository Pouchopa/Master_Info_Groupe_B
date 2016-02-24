<?php

use Illuminate\Database\Eloquent\Model;

class Ville extends Model {

	//
    public function patient()
    {
        return $this->belongsToMany('App\Patient');
    }

}
