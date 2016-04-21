<?php

use App\models\PatientMaladieChronique;
use App\models\MaladieChronique;

class PatientMaladieChroniqueController extends \BaseController {

	protected $model;

	public function __construct(PatientMaladieChronique $maladie) {
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->model = $maladie;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        // queries the clients db table, orders by client_name and lists client_name and id
          $maladies_options = MaladieChronique::orderBy('libelle', 'asc')->lists('libelle','id');

            return View::make('patientMaladieChronique/patientMaladieChronique_create', array('maladies_options' => $maladies_options));

        return View::make('patientMaladieChronique/patientMaladieChronique_create');
    }

	public function postCreate() {
	    $validator = Validator::make(Input::all(), PatientMaladieChronique::$rules);
	 
	    if ($validator->passes()) {
	        // validation has passed, save patient in DB
	        $patientMaladie = new PatientMaladieChronique;
            $patientMaladie->description = Input::get('description');
            $patientMaladie->patient_id = Input::get('patient_id');
            $patientMaladie->maladieChronique_id = Input::get('maladieChronique_id');
		    $patientMaladie->save();

		    return Redirect::to('patient/edit')->with('message', 'La maladie a été validée !');
	    } else {
	        // validation has failed, display error messages
	        return Redirect::to('patientMaladieChronique/create')->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
	    }
	}

    /**
     * Show the form for editing the specified resource.
     */
    public function getEdit($id)
    {
        $patientMaladieChronique = $this->model->findOrFail($id);
        $maladies_options = MaladieChronique::orderBy('libelle', 'asc')->lists('libelle','id');

        return View::make('patientMaladieChronique/patientMaladieChronique_edit',  compact('patientMaladieChronique', 'maladies_options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     */
    public function putUpdate($id)
    {
        $validator = Validator::make(Input::all(), PatientMaladieChronique::$rules);
        if ($validator->passes()) {

            $patient = PatientMaladieChronique::findOrFail($id);

            if ( $patient->update(Input::all()))
            {
                return Redirect::to('patient/edit/'. $id)->with('success', 'Maladie modifiée');
            } 
            else 
            {
                return Redirect::back()->with('fail', 'Une erreur est survenue lors de la modification. Veuilez réessayer')->withInput();
            }
        }
        else
        {
            return Redirect::to('patientMaladieChronique/edit/' .$id)->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
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
        $patientMaladie = PatientMaladieChronique::findOrFail($id)->delete();

        // redirect
        Session::flash('message', 'La maladie du patient a bien été supprimée !');
        return Redirect::to('patient/edit');
    }
}
