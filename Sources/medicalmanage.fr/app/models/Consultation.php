<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;

class Consultation extends SleepingOwlModel {

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


    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }
    public function maladie()
    {
        return $this->belongsTo('App\models\Maladie');
    }

    public function acte()
    {
        return $this->belongsTo('App\models\Acte');
    }

    public function scopeDefaultSort($query)
    {
        return $query->orderBy('date', 'asc');
    }

    public static function getPatientConsultation($user_id)
    {
        return Consultation::where('patient_id', '=', $user_id)->orderBy('date', 'asc')->get();
    }
}
