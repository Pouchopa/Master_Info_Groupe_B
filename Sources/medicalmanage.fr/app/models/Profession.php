<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;

class Profession extends SleepingOwlModel {

	//
    protected $table = 'professions';

    protected $fillable = [
        'libelle'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function patients()
    {
        return $this->hasMany('App\models\Patient');
    }

    public function scopeDefaultSort($query)
    {
        return $query->orderBy('libelle', 'asc');
    }

    public static function getList()
    {
        return static::lists('libelle', 'id');
    }

    public static function getProfessionById($id)
    {
        return Profession::findOrFail($id);
    }
}
