<?php

namespace App\Http\Controllers;

use App\Operation;
use App\Http\Requests\OperationRequest;
use App\Repositories\OperationRepository;
use App\Http\Requests\OperationUpdateRequest;

class OperationController extends Controller

{
protected $operationRepository;

    protected $nbrPerPage = 4;

    public function __construct(OperationRepository $operationRepository)
    {
        $this->operationRepository = $operationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operations = $this->operationRepository->getPaginate($this->nbrPerPage);

        $links = $operations->setPath('')->render();

        return view('operation_index', compact('operations', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operation_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperationRequest $request)
    {
        $operation = $this->operationRepository->store($request->all());

        return redirect('operation')->withOk("L'opération " . $operation->libelle_operation . " a été créée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operation = $this->operationRepository->getById($id);

        return view('operation_show',  compact('operation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operation = $this->operationRepository->getById($id);

        return view('operation_edit',  compact('operation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OperationUpdateRequest $request, $id)
    {
        $this->operationRepository->update($id, $request->all());

        return redirect('operation')->withOk("L'opération " . $request->input('libelle_operation') . " a été modifiée.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->operationRepository->destroy($id);

        return redirect()->back();
    }
}