<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class UtilisateurPatient extends Model implements AuthenticatableContract, CanResetPasswordContract
{
	use Authenticatable, CanResetPassword;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'utilisateur_patient';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['pseudo', 'mot_de_passe', 'nom', 'prenom', 'sexe', 'date_naissance',  'email', 'taux_de_graisse', 'taux_de_muscle', 'masse_osseuse', 'heures_travaillees', 'nbr_enfants', 'situation_familiale'];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $hidden = ['mot_de_passe', 'remember_token'];

    public $timestamps = false;

    public function setMotDePasseAttribute($mot_de_passe)
	{
	    $this->attributes['mot_de_passe'] = bcrypt($mot_de_passe);
	}
}
