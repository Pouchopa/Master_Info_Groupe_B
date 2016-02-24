<?php

namespace App\Http\Controllers;

use App\Alimentation;
use App\Http\Requests\AlimentationRequest;
use App\Repositories\AlimentationRepository;
use App\Http\Requests\AlimentationUpdateRequest;

class AlimentationController extends Controller

{

    protected $alimentationRepository;

    protected $nbrPerPage = 4;

    public function __construct(AlimentationRepository $alimentationRepository)
    {
        $this->alimentationRepository = $alimentationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alimentations = $this->alimentationRepository->getPaginate($this->nbrPerPage);

        $links = $alimentations->setPath('')->render();

        return view('alimentation_index', compact('alimentations', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alimentation_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlimentationRequest $request)
    {
        $alimentation = $this->alimentationRepository->store($request->all());

        return redirect('alimentation')->withOk("L'alimentation " . $alimentation->libelle_alimentation . " a été créée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alimentation = $this->alimentationRepository->getById($id);

        return view('alimentation_show',  compact('alimentation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alimentation = $this->alimentationRepository->getById($id);

        return view('alimentation_edit',  compact('alimentation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlimentationUpdateRequest $request, $id)
    {
        $this->alimentationRepository->update($id, $request->all());

        return redirect('alimentation')->withOk("L'alimentation " . $request->input('libelle_alimentation') . " a été modifiée.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->alimentationRepository->destroy($id);

        return redirect()->back();
    }
}