<?php

namespace App\Http\Controllers;

use App\Repositories\UtilisateurPatientRepository;
use App\Repositories\VilleRepository;
use App\Repositories\ProfessionRepository;
use App\Repositories\EvenementRepository;
use App\Repositories\OperationRepository;
use App\Repositories\MaladiechroniqueRepository;
use App\Repositories\EvenementPatientRepository;
use App\Repositories\OperationPatientRepository;
use App\Repositories\MaladiePatientRepository;

use App\UtilisateurPatient;

use App\Http\Requests\UtilisateurpatientRequest;
use App\Http\Requests\UtilisateurPatientUpdateRequest;

use Illuminate\Http\Request;


class UtilisateurpatientController extends Controller
{

    protected $utilisateurPatientRepository;

    protected $villeRepository;

    protected $professionRepository;

    protected $evenementRepository;

    protected $evenementPatientRepository;

    protected $operationRepository;

    protected $operationPatientRepository;

    protected $maladieRepository;

    protected $maladiePatientRepository;

    protected $nbrPerPage = 4;

    public function __construct(UtilisateurPatientRepository $utilisateurPatientRepository, 
                                VilleRepository $villeRepository,
                                ProfessionRepository $professionRepository,
                                EvenementRepository $evenementRepository,
                                EvenementPatientRepository $evenementPatientRepository,
                                OperationRepository $operationRepository,
                                OperationPatientRepository $operationPatientRepository,
                                MaladiechroniqueRepository $maladieRepository,
                                MaladiePatientRepository $maladiePatientRepository)
    {
        $this->utilisateurPatientRepository = $utilisateurPatientRepository;
        $this->villeRepository = $villeRepository;
        $this->professionRepository = $professionRepository;
        $this->evenementRepository = $evenementRepository;
        $this->evenementPatientRepository = $evenementPatientRepository;
        $this->operationRepository = $operationRepository;
        $this->operationPatientRepository = $operationPatientRepository;
        $this->maladieRepository = $maladieRepository;
        $this->maladiePatientRepository = $maladiePatientRepository;
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

        $ville = (!empty ($utilisateurPatient->ville_id != 0)) ? $this->villeRepository->getById($utilisateurPatient->ville_id) : null;

        $profession = (!empty($utilisateurPatient->profession_id != 0)) ? $this->professionRepository->getById($utilisateurPatient->profession_id) : null;

        $evenementPatient = $this->evenementPatientRepository->getByPatientId($utilisateurPatient->id);
        $evenement = (!empty($evenementPatient)) ? $this->evenementRepository->getById($evenementPatient->evenement_id) : null;

        $operationPatient = $this->operationPatientRepository->getByPatientId($utilisateurPatient->id);
        $operation = (!empty($operationPatient)) ? $this->operationRepository->getById($operationPatient->operation_id) : null;

        $maladiePatient = $this->maladiePatientRepository->getByPatientId($utilisateurPatient->id);
        $maladie = (!empty($maladiePatient)) ? $this->maladieRepository->getById($maladiePatient->maladie_id) : null;

        /*$evenementsPatient = $this->evenementPatientRepository->getByPatientId($utilisateurPatient->id);
        foreach ($evenementsPatient as $evenementPatient)
        {
            $evenement[] = $this->evenementRepository->getById($evenementPatient->evenement_id);
        }*/
        

        return view('utilisateurPatient_show',  compact('utilisateurPatient', 'ville', 'profession', 'evenementPatient', 'evenement', 'operationPatient', 'operation', 'maladie', 'maladiePatient'));
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

        $ville = (!empty($utilisateurPatient->ville_id != 0)) ? $this->villeRepository->getById($utilisateurPatient->ville_id) : null;
        $profession = (!empty($utilisateurPatient->profession_id != 0)) ? $this->professionRepository->getById($utilisateurPatient->profession_id) : null;

        return view('utilisateurPatient_edit',  compact('utilisateurPatient', 'ville', 'profession'));
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