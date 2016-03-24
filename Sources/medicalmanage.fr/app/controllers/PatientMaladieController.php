<?php

use App\models\PatientMaladie;
use App\models\Maladie;

class PatientMaladieController extends \BaseController {

	protected $model;

	public function __construct(PatientMaladie $maladie) {
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
          $maladies_options = Maladie::orderBy('libelle', 'asc')->lists('libelle','id');

            return View::make('patientMaladie/patientMaladie_create', array('maladies_options' => $maladies_options));

        return View::make('patientMaladie/patientMaladie_create');
    }

	public function postCreate() {
	    $validator = Validator::make(Input::all(), PatientMaladie::$rules);
	 
	    if ($validator->passes()) {
	        // validation has passed, save patient in DB
	        $patientMaladie = new PatientMaladie;
		    $patientMaladie->date = Input::get('date');
            $patientMaladie->patient_id = Input::get('patient_id');
            $patientMaladie->maladie_id = Input::get('maladie_id');
		    $patientMaladie->save();

		    return Redirect::to('patient/edit')->with('message', 'La maladie a été validée !');
	    } else {
	        // validation has failed, display error messages
	        return Redirect::to('patientMaladie/create')->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
	    }
	}

    /**
     * Show the form for editing the specified resource.
     */
    public function getEdit($id)
    {
        $patientMaladie = $this->model->findOrFail($id);
        $maladies_options = Maladie::orderBy('libelle', 'asc')->lists('libelle','id');

        return View::make('patientMaladie/patientMaladie_edit',  compact('patientMaladie', 'maladies_options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     */
    public function putUpdate($id)
    {
        $validator = Validator::make(Input::all(), PatientMaladie::$rules);
        if ($validator->passes()) {

            $patient = PatientMaladie::findOrFail($id);

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
            return Redirect::to('patientMaladie/edit/' .$id)->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
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
        $patientMaladie = PatientMaladie::findOrFail($id)->delete();

        // redirect
        Session::flash('message', 'La maladie du patient a bien été supprimée !');
        return Redirect::to('patient/edit');
    }
}
