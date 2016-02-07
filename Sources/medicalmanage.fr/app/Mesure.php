<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesure extends Model {

	//
    protected $table = 'mesures';

    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

}
