<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesure extends Model
{
    protected $table = 'mesure';   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['taille', 'poids', 'pointure'];

    public $timestamps = false;
}
