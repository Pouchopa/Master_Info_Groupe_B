<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Douleur extends Model {

    protected $table = 'douleurs';

    protected $fillable = [
        'position',
        'intensite',
        'date',
        'evolution',
        'description',
        'patient_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public static $rules = array(
        'position' => 'required',
        'intensite' => 'required',
        'date' => 'required',
        'description' => 'required',
        'patient_id' => 'required'
    );

    public static function getPatientDouleurs($user_id)
    {
        return Douleur::where('patient_id', '=', $user_id)->orderBy('date', 'asc')->get();
    }

}
