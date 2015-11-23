<?php


namespace App\Http\Controllers;


use App\UtilisateurAdmin;

use App\Http\Requests\UtilisateuradminRequest;


class UtilisateuradminController extends Controller

{


    public function getForm()

    {

        return view('utilisateurAdmin');

    }


    public function postForm(UtilisateuradminRequest $request, Utilisateuradmin $utilisateurAdmin)

    {

        $utilisateurAdmin->pseudo = $request->input('pseudo');

        $utilisateurAdmin->mot_de_passe = $request->input('mot_de_passe');

        $utilisateurAdmin->nom = $request->input('nom');

        $utilisateurAdmin->prenom = $request->input('prenom');

        $utilisateurAdmin->email = $request->input('email');

        $utilisateurAdmin->save();

        return view('utilisateurAdmin_ok');

    }


}