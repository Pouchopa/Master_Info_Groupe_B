<?php


namespace App\Http\Controllers;


use App\Profession;

use App\Http\Requests\ProfessionRequest;


class ProfessionController extends Controller

{


    public function getForm()

    {

        return view('profession');

    }


    public function postForm(ProfessionRequest $request, Profession $profession)

    {

        $profession->libelle_profession = $request->input('libelle_profession');

        $profession->stress_physique = $request->input('stress_physique');

        $profession->stress_psychique = $request->input('stress_psychique');

        $profession->posture_travail = $request->input('posture_travail');

        $profession->save();

        return view('profession_ok');

    }


}