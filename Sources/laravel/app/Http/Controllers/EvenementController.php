<?php


namespace App\Http\Controllers;


use App\Evenement;

use App\Http\Requests\EvenementRequest;


class EvenementController extends Controller

{


    public function getForm()

    {

        return view('evenement');

    }


    public function postForm(EvenementRequest $request, Evenement $evenement)

    {

        $evenement->libelle_evenement = $request->input('libelle_evenement');

        $evenement->description_evenement = $request->input('description_evenement');

        $evenement->save();

        return view('evenement_ok');

    }

}