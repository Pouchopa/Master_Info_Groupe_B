<?php namespace App\models;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Patient extends SleepingOwlModel implements ModelWithImageFieldsInterface, UserInterface, RemindableInterface 
{
    use ModelWithImageOrFileFieldsTrait;
    use UserTrait;
    use RemindableTrait;

    protected $table = 'patients';

    protected $fillable = [
        'pseudo',
        'mot_de_passe',
        'nom',
        'prenom',
        'photo',
        'email',
        'sexe',
        'date_naissance',
        'situation_familiale',
        'nbr_enfants'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static $rules = array(
        'pseudo'=>'required|alpha|min:2',
        'email'=>'required|email|unique:patients',
        'password'=>'required|alpha_num|between:6,12|confirmed',
        'password_confirmation'=>'required|alpha_num|between:6,12'
    );

    //get image field
    public function getImageFields()
    {
        return [
            'photo' => 'patients/'
        ];
    }
    //setImage
    public function setImage($field, $image)
    {
        parent::setImage($field, $image);
        $file = $this->$field;
        if ( ! $file->exists()) return;
        $path = $file->getFullPath();

        // you can use Intervention Image package features to change uploaded image
        // Image::make($path)->resize(10, 10)->save();
    }

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

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }



}
