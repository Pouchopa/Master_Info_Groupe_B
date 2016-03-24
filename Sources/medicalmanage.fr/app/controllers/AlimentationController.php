<?php

use App\models\Alimentation;

class AlimentationController extends BaseController {

	protected $model;

	public function __construct(Alimentation $alimentation) {
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->model = $alimentation;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return View::make('alimentation/alimentation_create');
    }

	public function postCreate() {
	    $validator = Validator::make(Input::all(), Alimentation::$rules);
	 
	    if ($validator->passes()) {
	        // validation has passed, save patient in DB
	        $alimentation = new Alimentation;
		    $alimentation->libelle = Input::get('libelle');
		    $alimentation->save();

		    return Redirect::to('patient/edit')->with('message', 'L\'alimentation a été validée !');
	    } else {
	        // validation has failed, display error messages
	        return Redirect::to('alimentation/create')->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
	    }
	}
}
