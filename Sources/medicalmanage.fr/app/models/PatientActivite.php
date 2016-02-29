<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class PatientActivite extends SleepingOwlModel {

	protected $table = 'patient_activites';

	protected $fillable = [
        'dateDebut',
        'dateFin',
        'description',
        'patient_id',
        'activite_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

	public static $rules = array(
        'dateDebut'=>'required',
        'dateFin'=>'required',
        'description'=>'required|alpha_num|min:2',
        'patient_id'=>'required',
        'activite_id'=>'required'
    );

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }

    public function activite()
    {
        return $this->belongsTo('App\models\Activite');
    }


}
