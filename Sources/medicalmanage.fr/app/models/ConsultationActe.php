<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;

class ConsultationActe extends SleepingOwlModel {

    //

    protected $table = 'consultation_actes';

    protected $fillable = [
        'consultation_id',
        'acte_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static $rules = array(
        'consultation_id'=>'required',
        'acte_id'=>'required'
    );

    public function consultation()
    {
        return $this->belongsTo('App\models\Consultation');
    }

    public function acte()
    {
        return $this->belongsTo('App\models\Acte');
    }

}