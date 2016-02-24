<?php

namespace App\Http\Controllers;

use App\Profession;
use App\Http\Requests\ProfessionRequest;
use App\Repositories\ProfessionRepository;
use App\Http\Requests\ProfessionUpdateRequest;

class ProfessionController extends Controller

{

    protected $professionRepository;

    protected $nbrPerPage = 4;

    public function __construct(ProfessionRepository $professionRepository)
    {
        $this->professionRepository = $professionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professions = $this->professionRepository->getPaginate($this->nbrPerPage);

        $links = $professions->setPath('')->render();

        return view('profession_index', compact('professions', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profession_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessionRequest $request)
    {
        $profession = $this->professionRepository->store($request->all());

        return redirect('profession')->withOk("La profession " . $profession->libelle_profession . " a été créée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profession = $this->professionRepository->getById($id);

        return view('profession_show',  compact('profession'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profession = $this->professionRepository->getById($id);

        return view('profession_edit',  compact('profession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(professionUpdateRequest $request, $id)
    {
        $this->professionRepository->update($id, $request->all());

        return redirect('profession')->withOk("La profession " . $request->input('libelle_profession') . " a été modifiée.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->professionRepository->destroy($id);

        return redirect()->back();
    }

}