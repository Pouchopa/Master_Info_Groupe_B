<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;

class Activite extends SleepingOwlModel {

    protected $table = 'activites';

    protected $fillable = [
        'libelle'
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
    public function patients()
    {
        return $this->belongsToMany('App\models\Patient');
    }

    public static function getList()
    {
        return static::lists('libelle', 'id');
    }



}
