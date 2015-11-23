<?php


namespace App\Http\Controllers;


use App\UtilisateurPatient;

use App\Http\Requests\UtilisateurpatientRequest;


class UtilisateurpatientController extends Controller

{


    public function getForm()

    {

        return view('utilisateurPatient');

    }


    public function postForm(UtilisateurpatientRequest $request)

    {

        $utilisateurPatient = new UtilisateurPatient;        

        var_dump($utilisateurPatient);die();


        $utilisateurPatient->pseudo = $request->input('pseudo');

        $utilisateurPatient->mot_de_passe = $request->input('mot_de_passe');

        $utilisateurPatient->nom = $request->input('nom');

        $utilisateurPatient->prenom = $request->input('prenom');

        $utilisateurPatient->sexe = $request->input('sexe');

        $utilisateurPatient->date_naissance = $request->input('date_naissance');

        $utilisateurPatient->email = $request->input('email');

        $utilisateurPatient->taux_de_graisse = $request->input('taux_de_graisse');

        $utilisateurPatient->taux_de_muscle = $request->input('taux_de_muscle');

        $utilisateurPatient->masse_osseuse = $request->input('masse_osseuse');

        $utilisateurPatient->heures_travailees = $request->input('heures_travailees');

        $utilisateurPatient->nbr_enfants = $request->input('nbr_enfants');

        $utilisateurPatient->situation_familiale = $request->input('situation_familiale');

        $utilisateurPatient->save();      

        return view('utilisateurPatient_ok');

    }


}