<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;

class Operation extends SleepingOwlModel {

	//

    protected $table = 'operations';

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
    public function patientOperations()
    {
        return $this->hasMany('App\models\PatientOperation');
    }

    public static function getList()
    {
        return static::lists('libelle', 'id');
    }

    public function scopeDefaultSort($query)
    {
        return $query->orderBy('libelle', 'asc');
    }

    public static function getOperationById($id)
    {
        return Operation::findOrFail($id);
    }
}
