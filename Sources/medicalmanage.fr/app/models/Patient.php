<?php namespace App\models;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
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
        'password',
        'nom',
        'prenom',
        'photo',
        'email',
        'sexe',
        'numero_tel',
        'date_naissance',
        'situation_familiale',
        'nbr_enfants',
        'remember_token',
        'ville_id',
        'profession_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static $rules = array(
        'pseudo'=>'required|alpha|min:2|unique:patients',
        'email'=>'required|email|unique:patients',
        'password'=>'required|alpha_num|between:6,12|confirmed',
        'password_confirmation'=>'required|alpha_num|between:6,12',
        'nom'=>'required|alpha|min:2',
        'prenom'=>'required|alpha|min:2',
        'sexe'=>'required|alpha'
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
        return $this->hasMany('App\models\Douleur');
    }

    public function mesures()
    {
        return $this->hasMany('App\models\Mesure');
    }

    public function consultations()
    {
        return $this->hasMany('App\models\Consultation');
    }

    public function rdvs()
    {
        return $this->hasMany('App\models\Rdv');
    }

    public function profession()
    {
        return $this->belongsTo('App\models\Profession');
    }

    public function ville()
    {
        return $this->belongsTo('App\models\Ville');
    }

    public function patientActivites()
    {
        return $this->hasMany('App\models\PatientActivite');
    }

    public function patientMaladieChroniques()
    {
        return $this->hasMany('App\models\PatientMaladieChronique');
    }

    public function patientAlimentations()
    {
        return $this->hasMany('App\models\PatientAlimentation');
    }

    public function patientOperations()
    {
        return $this->hasMany('App\models\PatientOperation');
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

    public function setActivitesAttribute($activites)
    {
        $this->activites()->detach();
        if ( ! $activites) return;

        if ( ! $this->exists) $this->save();

        $this->activites()->attach($activites);
    }

    public function scopeDefaultSort($query)
    {
        return $query->orderBy('date_naissance', 'asc');
    }

    public static function getList()
    {
        return static::lists('pseudo' , 'id');
    }



}
