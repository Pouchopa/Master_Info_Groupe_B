<?php


namespace App\Http\Controllers;


use App\Ville;

use App\Http\Requests\VilleRequest;


class VilleController extends Controller

{


    public function getForm()

    {

        return view('ville');

    }


    public function postForm(VilleRequest $request, Ville $ville)

    {

        $ville->nom_ville = $request->input('nom_ville');

        $ville->code_postal = $request->input('code_postal');

        $ville->climat = $request->input('climat');

        $ville->save();

        return view('ville_ok');

    }

}