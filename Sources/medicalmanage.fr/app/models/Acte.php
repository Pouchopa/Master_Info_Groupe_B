<?php namespace App\models;

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

    public static $rules = array(
        'libelle'=>'required'
    );
    //
    public function scopeDefaultSort($query)
    {
        return $query->orderBy('libelle', 'asc');
    }

    public function consultations()
    {
        return $this->hasMany('App\models\Consultation');
    }

    public static function getList()
    {
        return static::lists('libelle', 'id');
    }

    public static function getActeById($id)
    {
        return Acte::findOrFail($id);
    }

}
