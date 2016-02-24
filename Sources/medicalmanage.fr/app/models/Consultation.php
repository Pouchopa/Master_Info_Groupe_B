<?php

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model {

	//
    protected $table = 'consultations';

    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

}
