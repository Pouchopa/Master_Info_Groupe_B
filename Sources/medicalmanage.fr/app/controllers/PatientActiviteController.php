<?php

use App\Models\PatientActivite;

class PatientActiviteController extends BaseController {

	protected $model;

    protected $nbrPerPage = 4;

	public function __construct(PatientActivite $activite) {
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->model = $activite;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return View::make('activitePatient/activite_create');
    }

	public function postCreate() {
	    $validator = Validator::make(Input::all(), PatientActivite::$rules);
	 
	    if ($validator->passes()) {
	        // validation has passed, save patient in DB
	        $user = new PatientActivite;
		    $user->dateDebut = Input::get('dateDebut');
		    $user->dateFin = Input::get('dateFin');
            $user->description = Input::get('description');
            $user->patient_id = Input::get('patient_id');
            $user->activite_id = Input::get('activite_id');
		    $user->save();

		    return Redirect::to('patient/edit')->with('message', 'Votre inscription a été validée !');
	    } else {
	        // validation has failed, display error messages
	        return Redirect::to('activitePatient/create')->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
	    }
	}
}
