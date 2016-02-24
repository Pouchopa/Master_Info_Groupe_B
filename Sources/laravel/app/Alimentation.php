<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alimentation extends Model
{
    protected $table = 'alimentation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle_alimentation', 'description_alimentation'];

    public $timestamps = false;
}
