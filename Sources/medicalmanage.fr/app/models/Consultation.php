<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;

class Consultation extends SleepingOwlModel {

	//
    protected $table = 'consultations';

    protected $fillable = [
        'patient_id',
        'maladie_id',
        'date',
        'description',
        'commentaireKine',
        'commentairePatient'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }
    public function maladie()
    {
        return $this->belongsTo('App\models\Maladie');
    }

    public function actes()
    {
        return $this->belongsToMany('App\Acte');
    }

    public function consultationActes()
    {
        return $this->hasMany('App\models\ConsultationActe');
    }


}
