<?php

use App\models\PatientOperation;
use App\models\Operation;

class PatientOperationController extends \BaseController {

	protected $model;

	public function __construct(PatientOperation $operation) {
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->model = $operation;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        // queries the clients db table, orders by client_name and lists client_name and id
        $operations_options = Operation::orderBy('libelle', 'asc')->lists('libelle','id');

        return View::make('patientOperation/patientOperation_create', array('operations_options' => $operations_options));
    }

	public function postCreate() {
	    $validator = Validator::make(Input::all(), PatientOperation::$rules);
	 
	    if ($validator->passes()) {
	        // validation has passed, save patient in DB
	        $patientOperation = new PatientOperation;
		    $patientOperation->date = Input::get('date');
            $patientOperation->description = Input::get('description');
            $patientOperation->patient_id = Input::get('patient_id');
            $patientOperation->operation_id = Input::get('operation_id');
		    $patientOperation->save();

		    return Redirect::to('patient/edit')->with('message', 'L\'opération a été validée !');
	    } else {
	        // validation has failed, display error messages
	        return Redirect::to('patientOperation/create')->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
	    }
	}

    /**
     * Show the form for editing the specified resource.
     */
    public function getEdit($id)
    {
        $patientOperation = $this->model->findOrFail($id);
        $operations_options = Operation::orderBy('libelle', 'asc')->lists('libelle','id');

        return View::make('patientOperation/patientOperation_edit',  compact('patientOperation', 'operations_options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     */
    public function putUpdate($id)
    {
        $validator = Validator::make(Input::all(), PatientOperation::$rules);
        if ($validator->passes()) {

            $patient = PatientOperation::findOrFail($id);

            if ( $patient->update(Input::all()))
            {
                return Redirect::to('patient/edit/'. $id)->with('success', 'Opération modifiée');
            } 
            else 
            {
                return Redirect::back()->with('fail', 'Une erreur est survenue lors de la modification. Veuilez réessayer')->withInput();
            }
        }
        else
        {
            return Redirect::to('patientOperation/edit/' .$id)->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
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
        $patientOperation = PatientOperation::findOrFail($id)->delete();

        // redirect
        Session::flash('message', 'L\'opération du patient a bien été supprimée !');
        return Redirect::to('patient/edit');
    }
}
