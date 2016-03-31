<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;

class Ville extends SleepingOwlModel {

    protected $table = 'villes';

    protected $fillable = [
        'nom',
        'code_postal',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
	//
    public function patients()
    {
        return $this->hasMany('App\models\Patient');
    }

    public static function getList()
    {
        return static::lists('nom', 'id');
    }

    public static function getVilleById($id)
    {
        return Ville::findOrFail($id);
    }
}
