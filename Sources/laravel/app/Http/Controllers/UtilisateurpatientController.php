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

}