<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Activite extends SleepingOwlModel {

    protected $table = 'activites';

    protected $fillable = [
        'libelle'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
	//
    public function patient()
    {
        return $this->belongsToMany('App\models\Patient');
    }

}
