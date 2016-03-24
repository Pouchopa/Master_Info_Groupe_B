<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Alimentation extends Model {

    public function patientAlimentations()
    {
        return $this->hasMany('App\models\PatientAlimentation');
    }

    public static $rules = array(
        'libelle'=>'required'
    );

    public static function getAlimentationById($id)
    {
        return Alimentation::findOrFail($id);
    }
}
