<?php

use App\models\PatientAlimentation;
use App\models\Alimentation;

class PatientAlimentationController extends \BaseController {

	protected $model;

	public function __construct(PatientAlimentation $alimentation) {
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->model = $alimentation;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        // queries the clients db table, orders by client_name and lists client_name and id
          $alimentations_options = Alimentation::orderBy('libelle', 'asc')->lists('libelle','id');

            return View::make('patientAlimentation/patientAlimentation_create', array('alimentations_options' => $alimentations_options));

        return View::make('patientAlimentation/patientAlimentation_create');
    }

	public function postCreate() {
	    $validator = Validator::make(Input::all(), PatientAlimentation::$rules);
	 
	    if ($validator->passes()) {
	        // validation has passed, save patient in DB
	        $patientAlimentation = new PatientAlimentation;
            $patientAlimentation->description = Input::get('description');
            $patientAlimentation->patient_id = Input::get('patient_id');
            $patientAlimentation->alimentation_id = Input::get('alimentation_id');
		    $patientAlimentation->save();

		    return Redirect::to('patient/edit')->with('message', 'L\'alimentation a été validée !');
	    } else {
	        // validation has failed, display error messages
	        return Redirect::to('patientAlimentation/create')->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
	    }
	}

    /**
     * Show the form for editing the specified resource.
     */
    public function getEdit($id)
    {
        $patientAlimentation = $this->model->findOrFail($id);
        $alimentations_options = Alimentation::orderBy('libelle', 'asc')->lists('libelle','id');

        return View::make('patientAlimentation/patientAlimentation_edit',  compact('patientAlimentation', 'alimentations_options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     */
    public function putUpdate($id)
    {
        $validator = Validator::make(Input::all(), PatientAlimentation::$rules);
        if ($validator->passes()) {

            $patient = PatientAlimentation::findOrFail($id);

            if ( $patient->update(Input::all()))
            {
                return Redirect::to('patient/edit/'. $id)->with('success', 'ALimentation modifiée');
            } 
            else 
            {
                return Redirect::back()->with('fail', 'Une erreur est survenue lors de la modification. Veuilez réessayer')->withInput();
            }
        }
        else
        {
            return Redirect::to('patientAlimentation/edit/' .$id)->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
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
        $patientAlimentation = PatientAlimentation::findOrFail($id)->delete();

        // redirect
        Session::flash('message', 'L\'alimentation du patient a bien été supprimée !');
        return Redirect::to('patient/edit');
    }
}
