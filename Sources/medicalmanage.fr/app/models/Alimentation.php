<?php

use Illuminate\Database\Eloquent\Model;

class Alimentation extends Model {

	//
    public function patient()
    {
        return $this->belongsToMany('App\Patient');
    }

}
