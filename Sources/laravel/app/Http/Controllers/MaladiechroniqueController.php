<?php


namespace App\Http\Controllers;

use App\Maladiechronique;
use App\Http\Requests\MaladieChroniqueRequest;
use App\Repositories\MaladiechroniqueRepository;
use App\Http\Requests\MaladiechroniqueUpdateRequest;

class MaladiechroniqueController extends Controller

{
    protected $maladieRepository;

    protected $nbrPerPage = 4;

    public function __construct(MaladiechroniqueRepository $maladieRepository)
    {
        $this->maladieRepository = $maladieRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maladies = $this->maladieRepository->getPaginate($this->nbrPerPage);

        $links = $maladies->setPath('')->render();

        return view('maladie_index', compact('maladies', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maladie_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaladieChroniqueRequest $request)
    {
        $maladie = $this->maladieRepository->store($request->all());

        return redirect('maladiechronique')->withOk("La maladie " . $maladie->libelle_maladie . " a été créée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maladie = $this->maladieRepository->getById($id);

        return view('maladie_show',  compact('maladie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maladie = $this->maladieRepository->getById($id);

        return view('maladie_edit',  compact('maladie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaladiechroniqueUpdateRequest $request, $id)
    {
        $this->maladieRepository->update($id, $request->all());

        return redirect('maladiechronique')->withOk("La maladie " . $request->input('libelle_maladie') . " a été modifiée.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->maladieRepository->destroy($id);

        return redirect()->back();
    }
}