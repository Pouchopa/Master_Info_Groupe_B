<?php

use App\Models\Patient;
use App\models\PatientActivite;
use App\models\Activite;
use App\models\PatientAlimentation;
use App\models\Alimentation;
use App\models\PatientOperation;
use App\models\Operation;
use App\models\PatientMaladie;
use App\models\Maladie;
use App\models\Profession;
use App\models\Ville;

class PatientController extends BaseController {

	protected $model;

    protected $nbrPerPage = 4;

	public function __construct(Patient $patient) {
    	$this->beforeFilter('csrf', array('on'=>'post'));
    	$this->beforeFilter('auth', array('only'=>array('getDashboard')));
    	$this->model = $patient;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        // get all the patients
        $patients = $model->paginate($this->nbrPerPage);

        $links = $patients->setPath('')->render();

        // load the view and pass the patients
        return View::make('patient/patient_index', compact('utilisateursPatient', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return View::make('patient/patient_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(UtilisateurpatientRequest $request)
    {
       // validate
        $rules = array(
            'pseudo'       => 'required',
            'email'      => 'required|email'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('patients/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $patient = new Patient;
            $patient->name       = Input::get('nom');
            $patient->email      = Input::get('email');
            $patient->password = Input::get('password');
            $patient->save();

            // redirect
            Session::flash('message', 'Successfully created patient!');
            return Redirect::to('patients')->withOk("L'utilisateur " . $patient->pseudo . " a été créé.");
        }
    }*/

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getShow()
    {
    	$userId = Auth::user()->id;
        $patient = $this->model->findOrFail($userId);

        $patientActivites = PatientActivite::getPatientActivite($userId);
        for($i = 0; $i < count($patientActivites); $i++)
        {
            $patientActivites[$i]->activite = (!empty($patientActivites)) ? Activite::getActiviteById($patientActivites[$i]->activite_id) : null;
        }
        $patientAlimentations = PatientAlimentation::getPatientAlimentation($userId);
        for($i = 0; $i < count($patientAlimentations); $i++)
        {
            $patientAlimentations[$i]->alimentation = (!empty($patientAlimentations)) ? Alimentation::getAlimentationById($patientAlimentations[$i]->alimentation_id) : null;
        }
        $patientMaladies = PatientMaladie::getPatientMaladie($userId);
        for($i = 0; $i < count($patientMaladies); $i++)
        {
            $patientMaladies[$i]->maladie = (!empty($patientMaladies)) ? Maladie::getMaladieById($patientMaladies[$i]->maladie_id) : null;
        }
        $patientOperations = PatientOperation::getPatientOperation($userId);
        for($i = 0; $i < count($patientOperations); $i++)
        {
            $patientOperations[$i]->operation = (!empty($patientOperations)) ? Operation::getOperationById($patientOperations[$i]->operation_id) : null;
        }

        if($patient->profession_id != 0) {
            $profession = Profession::getProfessionById($patient->profession_id);
            $patient->profession = $profession->libelle;
        }
        if($patient->ville_id != 0) {
            $ville = Ville::getVilleById($patient->ville_id);
            $patient->ville = $ville->nom;
        }

        return View::make('patient/patient_show',  compact('patient', 'patientActivites', 'patientOperations', 'operation', 'maladie', 'patientMaladies', 'patientAlimentations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEdit()
    {
    	$userId = Auth::user()->id;
        $patient = $this->model->findOrFail($userId);

        $patient = $this->model->findOrFail($userId);

        $patientActivites = PatientActivite::getPatientActivite($userId);
        for($i = 0; $i < count($patientActivites); $i++)
        {
            $patientActivites[$i]->activite = (!empty($patientActivites)) ? Activite::getActiviteById($patientActivites[$i]->activite_id) : null;
        }
        $patientAlimentations = PatientAlimentation::getPatientAlimentation($userId);
        for($i = 0; $i < count($patientAlimentations); $i++)
        {
            $patientAlimentations[$i]->alimentation = (!empty($patientAlimentations)) ? Alimentation::getAlimentationById($patientAlimentations[$i]->alimentation_id) : null;
        }
        $patientMaladies = PatientMaladie::getPatientMaladie($userId);
        for($i = 0; $i < count($patientMaladies); $i++)
        {
            $patientMaladies[$i]->maladie = (!empty($patientMaladies)) ? Maladie::getMaladieById($patientMaladies[$i]->maladie_id) : null;
        }
        $patientOperations = PatientOperation::getPatientOperation($userId);
        for($i = 0; $i < count($patientOperations); $i++)
        {
            $patientOperations[$i]->operation = (!empty($patientOperations)) ? Operation::getOperationById($patientOperations[$i]->operation_id) : null;
        }
        $professions_options = array(''=>'');
        $villes_options = array(''=>'');
        $professions_options += Profession::orderBy('libelle', 'asc')->lists('libelle','id');
        $villes_options += Ville::orderBy('nom', 'asc')->lists('nom','id');

        return View::make('patient/patient_edit', array('professions_options' => $professions_options, 'villes_options' => $villes_options),  compact('patient', 'patientActivites', 'patientAlimentations', 'patientMaladies', 'patientOperations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function putUpdate($id)
    {
        $rules = array(
            'nom'        => 'required',
            'prenom'     => 'required',
            'email'      => 'required|email'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $patient = Patient::findOrFail($id);

            if ( $patient->update(Input::all()))
            {
                return Redirect::to('patient/show')->with('success', 'Profil modifié');
            } 
            else 
            {
                return Redirect::back()->with('fail', 'Une erreur est survenue lors de la modification. Veuilez réessayer')->withInput();
            }
        }
        else
        {
            return Redirect::to('patient/edit')->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
        }

//        return redirect('utilisateurpatient')->withOk("L'utilisateur " . $request->input('nom') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
        // delete
        $patient = Patient::findOrFail($id)->delete();

        // redirect
        Session::flash('message', 'Le compte a bien été supprimé !');
        return Redirect::to('auth/login');
    }

	public function getLogin() {
    	return View::make('auth/login');
	}

	public function postLogin() {
    	if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
		    return Redirect::to('/')->with('message', 'Vous êtes maintenant connecté.');
		} else {
		    return Redirect::to('auth/login')
		        ->with('message', 'Votre email ou mot de passe est incorrect')
		        ->withInput();
		}
	}

	public function getRegister() 
    {
        $professions_options = Profession::orderBy('libelle', 'asc')->lists('libelle','id');
        $villes_options = Ville::orderBy('nom', 'asc')->lists('nom','id');
    	return View::make('auth/register', array('professions_options' => $professions_options, 'villes_options' => $villes_options));
	}

	public function postRegister() {
	    $validator = Validator::make(Input::all(), Patient::$rules);
	 
	    if ($validator->passes()) {
	        // validation has passed, save patient in DB
	        $user = new Patient;
		    $user->pseudo = Input::get('pseudo');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
            $user->nom = Input::get('nom');
            $user->prenom = Input::get('prenom');
            $user->sexe = Input::get('sexe');
            $user->date_naissance = Input::get('date_naissance');
            $user->numero_tel = Input::get('telephone');
            $user->nbr_enfants = Input::get('nbr_enfants');
            $user->profession_id = Input::get('profession_id');
            $user->ville_id = Input::get('ville_id');
            if (Input::hasFile('avatar'))
            {
                $destinationPath = public_path() . '/images/patients/';
                $filename = Input::file('avatar')->getClientOriginalName();
                Input::file('avatar')->move($destinationPath, $filename);
                //$image = Image::make(sprintf($destinationPath.'%s', $filename))->resize(120, 120)->save();
                $user->photo = $filename;
            }
		    $user->save();

		    return Redirect::to('auth/login')->with('message', 'Votre inscription a été validée !');
	    } else {
	        // validation has failed, display error messages
	        return Redirect::to('auth/register')->with('message', 'Les erreurs suivantes sont apparues')->withErrors($validator)->withInput();
	    }
	}

	public function getDashboard() {
	    return View::make('patient/dashboard');
	}

	public function getLogout()
	{
	    Auth::logout();
    	return Redirect::to('auth/login')->with('message', 'Vous êtes maintenant déconnecté.');
	}
}
