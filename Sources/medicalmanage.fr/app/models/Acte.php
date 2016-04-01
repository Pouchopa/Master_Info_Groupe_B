<?php

namespace App\models;


use SleepingOwl\Models\SleepingOwlModel;

class Acte extends SleepingOwlModel {

    protected $table = 'actes';

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
    public function consultationActes()
    {
        return $this->hasMany('App\models\ConsultationActe');
    }

    public static function getList()
    {
        return static::lists('libelle', 'id');
    }

}
