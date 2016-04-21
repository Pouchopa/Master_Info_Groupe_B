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

		Mail::send('patient.mails.welcome', array('firstname'=>Input::get('fname'), 
													'lastname'=>Input::get('name'), 
													'corps'=>Input::get('message'), 
													'email'=>Input::get('email'), 
													'telephone'=>Input::get('phone')
													), function($message) {
		    $message->to(Input::get('email'), Input::get('fname').' '.Input::get('name'))->subject('Demande de contact');
		});

	   	return Redirect::to('contact')->with('message', 'Le message a été envoyé !');
	}
}
