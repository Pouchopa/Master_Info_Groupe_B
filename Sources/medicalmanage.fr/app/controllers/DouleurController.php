<?php

use App\Models\Patient;
use App\models\Douleur;

class DouleurController extends BaseController {

	protected $model;

	public function __construct(Douleur $douleur) {
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->model = $douleur;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return View::make('douleur/douleur_create');
    }

    public function getShow()
    {
    	$userId = Auth::user()->id;
        $patient = Patient::findOrFail($userId);

        $patientDouleurs = Douleur::getPatientDouleurs($userId);

        return View::make('douleur/douleur_show',  compact('patientDouleurs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function getEdit($id)
    {
        $patientDouleur = $this->model->findOrFail($id);

        return View::make('douleur/douleur_edit',  compact('patientDouleur'));
    }

	public function postCreate() {
	    $validator = Validator::make(Input::all(), Douleur::$rules);
	 
	    if ($validator->passes()) {
	        // validation has passed, save patient in DB
	        $douleur = new Douleur;
		    $douleur->date = Input::get('date');
		    $douleur->position = Input::get('position');
		    $douleur->intensite = Input::get('intensite');
		    $douleur->description = Input::get('description');
		    $douleur->patient_id = Input::get('patient_id');
		    $douleur->save();

		    return Redirect::to('douleur/show')->with('message', 'La douleur a été validée !');
	    } else {
	        // validation has failed, display error messages
	        return Redirect::to('douleur/create')->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
	    }
	}
}
