<?php


namespace App\Http\Controllers;


use App\Activite;

use App\Http\Requests\ActiviteRequest;


class ActiviteController extends Controller

{


    public function getForm()

    {

        return view('activite');

    }


    public function postForm(ActiviteRequest $request, Activite $activite)

    {

        $activite->libelle_activite = $request->input('libelle_activite');

        $activite->description_activite = $request->input('description_activite');

        $activite->save();

        return view('activite_ok');

    }

}