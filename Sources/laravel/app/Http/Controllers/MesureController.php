<?php

namespace App\Http\Controllers;

use App\Mesure;
use App\Http\Requests\MesureRequest;
use App\Repositories\MesureRepository;
use App\Http\Requests\MesureUpdateRequest;

class MesureController extends Controller
{

    protected $mesureRepository;

    protected $nbrPerPage = 4;

    public function __construct(MesureRepository $mesureRepository)
    {
        $this->mesureRepository = $mesureRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesures = $this->mesureRepository->getPaginate($this->nbrPerPage);

        $links = $mesures->setPath('')->render();

        return view('mesure_index', compact('mesures', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mesure_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MesureRequest $request)
    {
        $mesure = $this->mesureRepository->store($request->all());

        return redirect('mesure')->withOk("La mesure a été créée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mesure = $this->mesureRepository->getById($id);

        return view('mesure_show',  compact('mesure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mesure = $this->mesureRepository->getById($id);

        return view('mesure_edit',  compact('mesure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MesureUpdateRequest $request, $id)
    {
        $this->mesureRepository->update($id, $request->all());

        return redirect('mesure')->withOk("La mesure a été modifiée.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->mesureRepository->destroy($id);

        return redirect()->back();
    }

}