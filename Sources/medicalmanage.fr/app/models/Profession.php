<?php

use Illuminate\Database\Eloquent\Model;

class Profession extends Model {

	//
    public function patient()
    {
        return $this->belongsToMany('App\Patient');
    }

}
