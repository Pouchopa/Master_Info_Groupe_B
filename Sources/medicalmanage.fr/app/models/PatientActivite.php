<?php namespace app\models;

use Illuminate\Database\Eloquent\Model;

class PatientActivite extends Model {

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

}
