<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;

class PatientMaladieChronique extends SleepingOwlModel {

    protected $table = 'patient_maladieChroniques';

    protected $fillable = [
        'patient_id',
        'description',
        'maladieChronique_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static $rules = array(
        'patient_id'=>'required',
        'description'=>'required',
        'maladieChronique_id'=>'required'
    );

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }

    public function maladieChronique()
    {
        return $this->belongsTo('App\models\MaladieChronique');
    }

    public static function getPatientMaladieChronique($user_id)
    {
        return PatientMaladieChronique::where('patient_id', '=', $user_id)->get();
    }

}