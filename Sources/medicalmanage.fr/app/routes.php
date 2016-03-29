<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
//Route::controller('admin', 'AdminController');
Route::controller('auth', 'PatientController');
Route::controller('patient', 'PatientController');
Route::controller('patientActivite', 'PatientActiviteController');
Route::controller('activite', 'ActiviteController');
Route::controller('alimentation', 'AlimentationController');
Route::controller('patientAlimentation', 'PatientAlimentationController');
Route::controller('operation', 'OperationController');
Route::controller('patientOperation', 'PatientOperationController');
Route::controller('maladie', 'MaladieController');
Route::controller('patientMaladie', 'PatientMaladieController');
Route::controller('consultation', 'ConsultationController');
