<?php


namespace App\Http\Controllers;


use App\Operation;

use App\Http\Requests\OperationRequest;


class OperationController extends Controller

{


    public function getForm()

    {

        return view('operation');

    }


    public function postForm(OperationRequest $request, Operation $operation)

    {

        $operation->libelle_operation = $request->input('libelle_operation');

        $operation->description_operation = $request->input('description_operation');

        $operation->save();

        return view('operation_ok');

    }


}