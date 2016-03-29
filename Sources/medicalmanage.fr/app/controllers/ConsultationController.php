<?php

//use App\models\Activite;

class ConsultationController extends BaseController {

	protected $model;

	/*public function __construct(Activite $activite) {
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->model = $activite;
	}*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCalendar()
    {
        return View::make('consultation/calendar');
    }

	/*public function postCreate() {
	    $validator = Validator::make(Input::all(), Activite::$rules);
	 
	    if ($validator->passes()) {
	        // validation has passed, save patient in DB
	        $activite = new Activite;
		    $activite->libelle = Input::get('libelle');
		    $activite->save();

		    return Redirect::to('patient/edit')->with('message', 'L\'activité a été validée !');
	    } else {
	        // validation has failed, display error messages
	        return Redirect::to('activite/create')->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
	    }
	}*/
}
