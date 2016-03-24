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

    public static $rules = array(
        'date'=>'required',
        'description'=>'required|alpha_num|min:2',
        'patient_id'=>'required',
        'operation_id'=>'required'
    );

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }

    public function operation()
    {
        return $this->belongsTo('App\models\Operation');
    }

    public static function getPatientOperation($user_id)
    {
        return PatientOperation::where('patient_id', '=', $user_id)->orderBy('date', 'asc')->get();
    }
}
