<?php


namespace App\Http\Controllers;


use App\Douleur;

use App\Http\Requests\DouleurRequest;


class DouleurController extends Controller

{


    public function getForm()

    {

        return view('douleur');

    }


    public function postForm(DouleurRequest $request, Douleur $douleur)

    {

        $douleur->intensite_douleur = $request->input('intensite_douleur');

        $douleur->position_douleur = $request->input('position_douleur');

        $douleur->evolution_douleur = $request->input('evolution_douleur');

        $douleur->save();

        return view('douleur_ok');

    }

}