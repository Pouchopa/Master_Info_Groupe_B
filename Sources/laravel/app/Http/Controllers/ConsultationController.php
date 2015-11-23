<?php


namespace App\Http\Controllers;


use App\Consultation;

use App\Http\Requests\ConsultationRequest;


class ConsultationController extends Controller

{


    public function getForm()

    {

        return view('consultation');

    }


    public function postForm(ConsultationRequest $request, Consultation $consultation)

    {

        $consultation->date_consultation = $request->input('date_consultation');

        $consultation->type_consultation = $request->input('type_consultation');

        $consultation->duree = $request->input('duree');

        $consultation->commentaire_kine = $request->input('commentaire_kine');

        $consultation->commentaire_patient = $request->input('commentaire_patient');

        $consultation->save();

        return view('consultation_ok');

    }

}