<?php


namespace App\Http\Controllers;

use App\Repositories\UtilisateurPatientRepository;

use App\UtilisateurPatient;

use App\Http\Requests\UtilisateurpatientRequest;

use App\Http\Requests\UtilisateurPatientUpdateRequest;

use Illuminate\Http\Request;


class UtilisateurpatientController extends Controller

{

    protected $utilisateurPatientRepository;


    protected $nbrPerPage = 4;


    public function __construct(UtilisateurPatientRepository $utilisateurPatientRepository)
    {

        $this->utilisateurPatientRepository = $utilisateurPatientRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilisateursPatient = $this->utilisateurPatientRepository->getPaginate($this->nbrPerPage);

        $links = $utilisateursPatient->setPath('')->render();

        return view('utilisateurPatient_index', compact('utilisateursPatient', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('utilisateurPatient_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UtilisateurpatientRequest $request)
    {
        $utilisateurPatient = $this->utilisateurPatientRepository->store($request->all());

        return redirect('utilisateurpatient')->withOk("L'utilisateur " . $utilisateurPatient->pseudo . " a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $utilisateurPatient = $this->utilisateurPatientRepository->getById($id);

        return view('utilisateurPatient_show',  compact('utilisateurPatient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $utilisateurPatient = $this->utilisateurPatientRepository->getById($id);

        return view('utilisateurPatient_edit',  compact('utilisateurPatient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UtilisateurPatientUpdateRequest $request, $id)
    {
        $this->utilisateurPatientRepository->update($id, $request->all());

        return redirect('utilisateurpatient')->withOk("L'utilisateur " . $request->input('nom') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->utilisateurPatientRepository->destroy($id);

        return redirect()->back();
    }

    /*public function getForm()

    {

        return view('utilisateurPatient');

    }


    public function postForm(UtilisateurpatientRequest $request)

    {

        $utilisateurPatient = new UtilisateurPatient;        

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

        $utilisateurPatient->heures_travaillees = $request->input('heures_travaillees');

        $utilisateurPatient->nbr_enfants = $request->input('nbr_enfants');

        $utilisateurPatient->situation_familiale = $request->input('situation_familiale');

        $utilisateurPatient->save();      

        return view('utilisateurPatient_ok');

    }*/


}