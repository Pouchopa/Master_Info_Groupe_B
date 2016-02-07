<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Douleur extends Model {

	//
    protected $table = 'douleurs';

    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

}
