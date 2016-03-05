<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;

class PatientProfession extends SleepingOwlModel {

	//
    protected $table = 'patient_professions';

    protected $fillable = [
        'dateDebut',
        'dateFin',
        'nbrHeurParSemaine',
        'description',
        'patient_id',
        'profession_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }

    public function profession()
    {
        return $this->belongsTo('App\models\Profession');
    }
}
