<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table = 'profession';    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle_profession', 'stress_physique', 'stress_psychique', 'posture_travail'];
    
    public $timestamps = false;
}
