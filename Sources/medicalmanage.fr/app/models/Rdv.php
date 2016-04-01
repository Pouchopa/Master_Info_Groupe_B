<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;

class Rdv extends SleepingOwlModel {

    protected $table = 'rdvs';

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

    public static $rules = array(
        'date' => 'required',
        'heure' => 'required',
        'motif' => 'required',
        'patient_id' => 'required'
    );

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }

}
