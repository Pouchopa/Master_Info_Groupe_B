<?php

namespace App\Http\Controllers;

use App\Douleur;
use App\Http\Requests\DouleurRequest;
use App\Repositories\DouleurRepository;
use App\Http\Requests\DouleurUpdateRequest;

class DouleurController extends Controller

{
    protected $douleurRepository;

    protected $nbrPerPage = 4;

    public function __construct(DouleurRepository $douleurRepository)
    {
        $this->douleurRepository = $douleurRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $douleurs = $this->douleurRepository->getPaginate($this->nbrPerPage);

        $links = $douleurs->setPath('')->render();

        return view('douleur_index', compact('douleurs', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('douleur_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DouleurRequest $request)
    {
        $douleur = $this->douleurRepository->store($request->all());

        return redirect('douleur')->withOk("La douleur " . $douleur->libelle_douleur . " a été créée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $douleur = $this->douleurRepository->getById($id);

        return view('douleur_show',  compact('douleur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $douleur = $this->douleurRepository->getById($id);

        return view('douleur_edit',  compact('douleur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(douleurUpdateRequest $request, $id)
    {
        $this->douleurRepository->update($id, $request->all());

        return redirect('douleur')->withOk("La douleur " . $request->input('libelle_douleur') . " a été modifiée.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->douleurRepository->destroy($id);

        return redirect()->back();
    }
}