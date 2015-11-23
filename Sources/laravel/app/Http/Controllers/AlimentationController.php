<?php


namespace App\Http\Controllers;


use App\Alimentation;

use App\Http\Requests\AlimentationRequest;


class AlimentationController extends Controller

{


    public function getForm()

    {

        return view('alimentation');

    }


    public function postForm(AlimentationRequest $request, Alimentation $alimentation)

    {

        $alimentation->libelle_alimentation = $request->input('libelle_alimentation');

        $alimentation->description_alimentation = $request->input('description_alimentation');

        $alimentation->save();

        return view('alimentation_ok');

    }

}