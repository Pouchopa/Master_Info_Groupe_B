<?php


namespace App\Http\Controllers;


use App\MaladieChronique;

use App\Http\Requests\MaladiechroniqueRequest;


class MaladiechroniqueController extends Controller

{


    public function getForm()

    {

        return view('maladiechronique');

    }


    public function postForm(MaladiechroniqueRequest $request, MaladieChronique $maladieChronique)

    {

        $maladieChronique->libelle_maladie = $request->input('libelle_maladie');

        $maladieChronique->description_maladie = $request->input('description_maladie');

        $maladieChronique->save();

        return view('maladiechronique_ok');

    }

}