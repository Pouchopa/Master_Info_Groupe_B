<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;

class PatientOperation extends SleepingOwlModel {

	//
    protected $table = 'patient_operations';

    protected $fillable = [
        'date',
        'description',
        'patient_id',
        'operation_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }

    public function operation()
    {
        return $this->belongsTo('App\models\Operation');
    }

}
