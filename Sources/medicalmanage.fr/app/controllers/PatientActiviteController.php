<?php

use App\models\PatientActivite;
use App\models\Activite;

class PatientActiviteController extends \BaseController {

	protected $model;

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
        // queries the clients db table, orders by client_name and lists client_name and id
          $activites_options = Activite::orderBy('libelle', 'asc')->lists('libelle','id');

            return View::make('patientActivite/patientActivite_create', array('activites_options' => $activites_options));

        return View::make('patientActivite/patientActivite_create');
    }

	public function postCreate() {
	    $validator = Validator::make(Input::all(), PatientActivite::$rules);
	 
	    if ($validator->passes()) {
	        // validation has passed, save patient in DB
	        $patientActivite = new PatientActivite;
		    $patientActivite->dateDebut = Input::get('dateDebut');
		    $patientActivite->dateFin = Input::get('dateFin');
            $patientActivite->description = Input::get('description');
            $patientActivite->patient_id = Input::get('patient_id');
            $patientActivite->activite_id = Input::get('activite_id');
		    $patientActivite->save();

		    return Redirect::to('patient/edit')->with('message', 'L\'activité a été validée !');
	    } else {
	        // validation has failed, display error messages
	        return Redirect::to('patientActivite/create')->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
	    }
	}

    /**
     * Show the form for editing the specified resource.
     */
    public function getEdit($id)
    {
        $patientActivite = $this->model->findOrFail($id);
        $activites_options = Activite::orderBy('libelle', 'asc')->lists('libelle','id');

        return View::make('patientActivite/patientActivite_edit',  compact('patientActivite', 'activites_options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     */
    public function putUpdate($id)
    {
        $validator = Validator::make(Input::all(), PatientActivite::$rules);
        if ($validator->passes()) {

            $patient = PatientActivite::findOrFail($id);

            if ( $patient->update(Input::all()))
            {
                return Redirect::to('patient/edit/'. $id)->with('success', 'Activité modifiée');
            } 
            else 
            {
                return Redirect::back()->with('fail', 'Une erreur est survenue lors de la modification. Veuilez réessayer')->withInput();
            }
        }
        else
        {
            return Redirect::to('patientActivite/edit/' .$id)->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
        // delete
        $patientActivite = PatientActivite::findOrFail($id)->delete();

        // redirect
        Session::flash('message', 'L\'activité du patient a bien été supprimée !');
        return Redirect::to('patient/edit');
    }
}
