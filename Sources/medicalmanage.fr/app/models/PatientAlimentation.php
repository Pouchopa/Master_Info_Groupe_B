<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PatientAlimentation extends Model {

	protected $table = 'patient_alimentations';

	protected $fillable = [
        'description',
        'patient_id',
        'alimentation_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

	public static $rules = array(
		'description'=>'required',
        'patient_id'=>'required',
        'alimentation_id'=>'required'
    );

    public function patient()
    {
        return $this->belongsTo('App\models\Patient');
    }

    public function alimentation()
    {
        return $this->belongsTo('App\models\Alimentation');
    }

    public static function getPatientAlimentation($user_id)
    {
        return PatientAlimentation::where('patient_id', '=', $user_id)->get();
    }

}
