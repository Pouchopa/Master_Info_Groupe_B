<?php


namespace App\Http\Controllers;

use App\Evenement;
use App\Http\Requests\EvenementRequest;
use App\Repositories\EvenementRepository;
use App\Http\Requests\EvenementUpdateRequest;

class EvenementController extends Controller

{
    protected $evenementRepository;

    protected $nbrPerPage = 4;

    public function __construct(EvenementRepository $evenementRepository)
    {
        $this->evenementRepository = $evenementRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evenements = $this->evenementRepository->getPaginate($this->nbrPerPage);

        $links = $evenements->setPath('')->render();

        return view('evenement_index', compact('evenements', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evenement_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EvenementRequest $request)
    {
        $evenement = $this->evenementRepository->store($request->all());

        return redirect('evenement')->withOk("L'évènement " . $evenement->libelle_evenement . " a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evenement = $this->evenementRepository->getById($id);

        return view('evenement_show',  compact('evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evenement = $this->evenementRepository->getById($id);

        return view('evenement_edit',  compact('evenement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(evenementUpdateRequest $request, $id)
    {
        $this->evenementRepository->update($id, $request->all());

        return redirect('evenement')->withOk("L'évènement " . $request->input('libelle_evenement') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->evenementRepository->destroy($id);

        return redirect()->back();
    }

}