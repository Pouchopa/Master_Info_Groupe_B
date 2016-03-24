<?php

use App\models\Operation;

class OperationController extends BaseController {

	protected $model;

	public function __construct(Operation $operation) {
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->model = $operation;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return View::make('operation/operation_create');
    }

	public function postCreate() {
	    $validator = Validator::make(Input::all(), Operation::$rules);
	 
	    if ($validator->passes()) {
	        // validation has passed, save patient in DB
	        $operation = new Operation;
		    $operation->libelle = Input::get('libelle');
		    $operation->save();

		    return Redirect::to('patient/edit')->with('message', 'L\'opération a été validée !');
	    } else {
	        // validation has failed, display error messages
	        return Redirect::to('operation/create')->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
	    }
	}
}
