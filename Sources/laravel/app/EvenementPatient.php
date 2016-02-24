<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvenementPatient extends Model
{
    protected $table = 'evenement_patient';

    protected $fillable = ['date_evenement', 'patient_id', 'evenement_id', 'commentaire'];

    public $timestamps = false;
}
