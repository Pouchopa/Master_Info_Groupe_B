<?php

namespace App\Http\Controllers;

use App\Repositories\ActiviteRepository;
use App\Activite;
use App\Http\Requests\ActiviteRequest;
use App\Http\Requests\ActiviteUpdateRequest;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{

    protected $activiteRepository;

    protected $nbrPerPage = 4;

    public function __construct(ActiviteRepository $activiteRepository)
    {
        $this->activiteRepository = $activiteRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activites = $this->activiteRepository->getPaginate($this->nbrPerPage);

        $links = $activites->setPath('')->render();

        return view('activite_index', compact('activites', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activite_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActiviteRequest $request)
    {
        $activite = $this->activiteRepository->store($request->all());

        return redirect('activite')->withOk("L'activité " . $activite->libelle_activite . " a été créée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activite = $this->activiteRepository->getById($id);

        return view('activite_show',  compact('activite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activite = $this->activiteRepository->getById($id);

        return view('activite_edit',  compact('activite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(activiteUpdateRequest $request, $id)
    {
        $this->activiteRepository->update($id, $request->all());

        return redirect('activite')->withOk("L'activité " . $request->input('libelle_activite') . " a été modifiée.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->activiteRepository->destroy($id);

        return redirect()->back();
    }

}