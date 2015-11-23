<?php


namespace App\Http\Controllers;


use App\Mesure;

use App\Http\Requests\MesureRequest;


class MesureController extends Controller

{

    public function getForm()
    {

        return view('mesure');

    }

    public function postForm(MesureRequest $request, Mesure $mesure)
    {

        $mesure->taille = $request->input('taille');

        $mesure->poids = $request->input('poids');

        $mesure->pointure = $request->input('pointure');

        $mesure->save();

        return view('mesure_ok');

    }

}