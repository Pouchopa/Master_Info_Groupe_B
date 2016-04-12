<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;

class MaladieChronique extends SleepingOwlModel {

    protected $table = 'maladieChroniques';

    protected $fillable = [
        'libelle',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    //
    public function scopeDefaultSort($query)
    {
        return $query->orderBy('libelle', 'asc');
    }
    public function patientMaladieChroniques()
    {
        return $this->hasMany('App\models\PatientMaladieChronique');
    }

    public static function getList()
    {
        return static::lists('libelle', 'id');
    }

    public static $rules = array(
        'libelle'=>'required'
    );

    public static function getMaladieChroniqueById($id)
    {
        return MaladieChronique::findOrFail($id);
    }


}
