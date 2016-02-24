<?php

use Illuminate\Database\Eloquent\Model;

class Operation extends Model {

	//
    public function patient()
    {
        return $this->belongsToMany('App\Patient');
    }
}
