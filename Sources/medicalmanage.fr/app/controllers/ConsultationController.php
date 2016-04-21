<?php

use App\models\Patient;
use App\models\Consultation;
use App\models\ConsultationActe;
use App\models\Maladie;
use App\models\Rdv;

class ConsultationController extends BaseController {

	protected $model;

	public function __construct(Consultation $consultation) {
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->model = $consultation;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCalendar()
    {
        return View::make('consultation/calendar');
    }

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getShow()
    {
    	$userId = Auth::user()->id;
        $patient = Patient::findOrFail($userId);

        $patientConsultations = Consultation::getPatientConsultation($userId);
        for($i = 0; $i < count($patientConsultations); $i++)
        {
            $patientConsultations[$i]->maladie = (!empty($patientConsultations)) ? Maladie::getMaladieById($patientConsultations[$i]->maladie_id) : null;
            $patientConsultations[$i]->acte = (!empty($patientConsultations)) ? ConsultationActe::getActeConsultationById($patientConsultations[$i]->id) : null;
        }

        return View::make('consultation/consultation_show', compact('patientConsultations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function getEdit($id)
    {
        $consultation = $this->model->findOrFail($id);

        return View::make('consultation/consultation_edit',  compact('consultation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function putUpdate($id)
    {
        $rules = array(
            'commentairePatient' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $consultation = Consultation::findOrFail($id);

            if ( $consultation->update(Input::all()))
            {
                return Redirect::to('consultation/show')->with('success', 'Profil modifié');
            } 
            else 
            {
                return Redirect::back()->with('fail', 'Une erreur est survenue lors de la modification. Veuilez réessayer')->withInput();
            }
        }
        else
        {
            return Redirect::to('consultation/edit/' . $id)->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAsk()
    {
        return View::make('consultation/rendezVous_ask');
    }

    public function postAsk() {
	    $validator = Validator::make(Input::all(), Rdv::$rules);
	 
	    if ($validator->passes()) {
	        // validation has passed, save patient in DB
	        $rendezVous = new Rdv;
		    $rendezVous->date = Input::get('date');
		    $rendezVous->heure = Input::get('heure');
		    $rendezVous->motif = Input::get('motif');
		    $rendezVous->patient_id = Input::get('patient_id');
		    $rendezVous->save();

		    return Redirect::to('consultation/show')->with('message', 'Le rendez-vous a été validé !');
	    } else {
	        // validation has failed, display error messages
	        return Redirect::to('consultation/ask')->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
	    }
	}
}
