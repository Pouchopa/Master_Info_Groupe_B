<?php namespace App\models;

use SleepingOwl\Models\SleepingOwlModel;
use App\models\Acte;

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

    public static function getActeConsultationById($id)
    {
        $consultationsActe = ConsultationActe::where('consultation_id', '=', $id)->get();

        $consultationsActes = array();
        foreach ($consultationsActe as $acte) {
            $actes = Acte::where('id', '=', $acte['acte_id'])->get();
            array_push($consultationsActes, $actes);
        }

        return $consultationsActes;
    }

}