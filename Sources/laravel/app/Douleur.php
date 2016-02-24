<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Douleur extends Model
{
    protected $table = 'douleur';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle_activite', 'description_activite'];
    
    public $timestamps = false;
}
