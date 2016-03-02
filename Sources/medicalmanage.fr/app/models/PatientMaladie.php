<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class PatientMaladie extends SleepingOwlModel {

	//
    protected $table = 'patient_maladies';

    protected $fillable = [
        'patient_id',
        'maladie_id'
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


}
