<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;

class Maladie extends SleepingOwlModel {

    protected $table = 'maladies';

    protected $fillable = [
        'libelle',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static $rules = array(
        'libelle'=>'required'
    );
	//
    public function patientMaladies()
    {
        return $this->hasMany('App\models\PatientMaladie');
    }


    public function consultations()
    {
        return $this->hasMany('App\models\Consultation');
    }

    public function scopeDefaultSort($query)
    {
        return $query->orderBy('libelle', 'asc');
    }

    public static function getList()
    {
        return static::lists('libelle', 'id');
    }

    public static function getMaladieById($id)
    {
        return Maladie::findOrFail($id);
    }

}
