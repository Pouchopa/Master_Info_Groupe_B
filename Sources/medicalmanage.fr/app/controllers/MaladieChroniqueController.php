<?php

use App\models\MaladieChronique;

class MaladieChroniqueController extends BaseController {

	protected $model;

	public function __construct(MaladieChronique $maladie) {
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->model = $maladie;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return View::make('maladieChronique/maladie_create');
    }

	public function postCreate() {
	    $validator = Validator::make(Input::all(), MaladieChronique::$rules);
	 
	    if ($validator->passes()) {
	        // validation has passed, save patient in DB
	        $maladie = new MaladieChronique;
		    $maladie->libelle = Input::get('libelle');
		    $maladie->save();

		    return Redirect::to('patient/edit')->with('message', 'La maladie a été validée !');
	    } else {
	        // validation has failed, display error messages
	        return Redirect::to('maladieChronique/create')->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
	    }
	}
}
