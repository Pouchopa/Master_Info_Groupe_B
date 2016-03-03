<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;

class Rdv extends SleepingOwlModel {

	//
    protected $table = 'rdvs';

    public $timestamps = false;

    protected $fillable = [
        'patient_id',
        'date',
        'heure',
        'motif'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }


}
