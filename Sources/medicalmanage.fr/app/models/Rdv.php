<?php

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model {

	//
    protected $table = 'rdvs';

    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }


}
