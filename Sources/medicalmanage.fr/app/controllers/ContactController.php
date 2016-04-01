<?php

class ContactController extends BaseController {

	protected $model;

	public function __construct() {
    	$this->beforeFilter('csrf', array('on'=>'post'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getContact()
    {
        return View::make('/contact');
    }

	public function postContact() {
	    $to      = 'thomas.hannauer@gmail.com';
		$subject = 'Demande de contact ';
		$message = 'Bonjour,' . "\n";
		$message += Input::get('fname') . Input::get('name') . 'vous a contacté via le site de kinésythérapie.' . "\n";
		$message += 'Son message : ' . Input::get('message') . "\n";
		$message += 'Vous pouvez le contactez par e-mail : ' . Input::get('email') . ' ou numéro de téléphone : ' . Input::get('telephone') . '.' . "\n";
		$message += 'Cordialement,' . "\n";
		$message += 'Le service technique de kinésithérapie.';
		$headers = 'From: webmaster@kine.com' . "\r\n" .
		    'Reply-To: webmaster@kine.com' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);

	   	return Redirect::to('contact')->with('message', 'Le message a été envoyé !');
	}
}
