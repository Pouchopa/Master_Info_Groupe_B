<?php

namespace App\Http\Controllers;

use App\Repositories\VilleRepository;
use App\Ville;
use App\Http\Requests\VilleRequest;
use App\Http\Requests\VilleUpdateRequest;
use Illuminate\Http\Request;

class VilleController extends Controller
{

    protected $villeRepository;

    protected $nbrPerPage = 4;

    public function __construct(VilleRepository $villeRepository)
    {
        $this->villeRepository = $villeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villes = $this->villeRepository->getPaginate($this->nbrPerPage);

        $links = $villes->setPath('')->render();

        return view('ville_index', compact('villes', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ville_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VilleRequest $request)
    {
        $ville = $this->villeRepository->store($request->all());

        return redirect('ville')->withOk("La ville " . $ville->nom_ville . " a été créée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ville = $this->villeRepository->getById($id);

        return view('ville_show',  compact('ville'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ville = $this->villeRepository->getById($id);

        return view('ville_edit',  compact('ville'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VilleUpdateRequest $request, $id)
    {
        $this->villeRepository->update($id, $request->all());

        return redirect('ville')->withOk("La ville " . $request->input('nom_ville') . " a été modifiée.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->villeRepository->destroy($id);

        return redirect()->back();
    }

}