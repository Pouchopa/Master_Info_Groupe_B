<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model {

    public function douleurs()
    {
        return $this->hasMany('App\Douleur');
    }

    public function mesures()
    {
        return $this->hasMany('App\Mesure');
    }

    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }

    public function rdvs()
    {
        return $this->hasMany('App\Rdv');
    }

    public function professions()
    {
        return $this->belongsToMany('App\Profession');
    }

    public function villes()
    {
        return $this->belongsToMany('App\Ville');
    }

    public function activites()
    {
        return $this->belongsToMany('App\Activite');
    }

    public function malasies()
    {
        return $this->belongsToMany('App\Maladie');
    }

    public function alimentations()
    {
        return $this->belongsToMany('App\Alimentation');
    }

    public function operations()
    {
        return $this->belongsToMany('App\Operation');
    }

}
