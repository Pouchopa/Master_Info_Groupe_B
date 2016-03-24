<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class PatientMaladie extends SleepingOwlModel {

	//
    protected $table = 'patient_maladies';

    protected $fillable = [
        'patient_id',
        'maladie_id',
        'date'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static $rules = array(
        'date'=>'required',
        'patient_id'=>'required',
        'maladie_id'=>'required'
    );

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }

    public function maladie()
    {
        return $this->belongsTo('App\models\Maladie');
    }

    public static function getPatientMaladie($user_id)
    {
        return PatientMaladie::where('patient_id', '=', $user_id)->orderBy('date', 'asc')->get();
    }
}
