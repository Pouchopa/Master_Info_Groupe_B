<?php


namespace App\Http\Controllers;


use App\UtilisateurAdmin;

use App\Http\Requests\UtilisateurAdminRequest;


class UtilisateuradminController extends Controller

{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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