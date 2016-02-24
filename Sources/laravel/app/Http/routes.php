<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('utilisateurpatient', 'UtilisateurpatientController');
Route::get('utilisateurpatient.show', 'UtilisateurpatientController@show');
Route::get('utilisateurpatient/{all}', 'UtilisateurpatientController@edit');
Route::get('utilisateurpatient.destroy', 'UtilisateurpatientController@destroy');
Route::get('utilisateurpatient.create', 'UtilisateurpatientController@create');

Route::resource('ville', 'VilleController');
Route::get('ville.show', 'VilleController@show');
Route::get('ville/{all}', 'VilleController@edit');
Route::get('ville.destroy', 'VilleController@destroy');
Route::get('ville.create', 'VilleController@create');

Route::resource('activite', 'ActiviteController');
Route::get('activite.show', 'ActiviteController@show');
Route::get('activite/{all}', 'ActiviteController@edit');
Route::get('activite.destroy', 'ActiviteController@destroy');
Route::get('activite.create', 'ActiviteController@create');

Route::resource('alimentation', 'AlimentationController');
Route::get('alimentation.show', 'Alimentationontroller@show');
Route::get('alimentation/{all}', 'AlimentationController@edit');
Route::get('alimentation.destroy', 'AlimentationController@destroy');
Route::get('alimentation.create', 'AlimentationController@create');

Route::resource('consultation', 'ConsultationController');
Route::get('consultation.show', 'ConsultationController@show');
Route::get('consultation/{all}', 'ConsultationController@edit');
Route::get('consultation.destroy', 'ConsultationController@destroy');
Route::get('consultation.create', 'ConsultationController@create');

Route::resource('douleur', 'DouleurController');
Route::get('douleur.show', 'DouleurController@show');
Route::get('douleur/{all}', 'DouleurController@edit');
Route::get('douleur.destroy', 'DouleurController@destroy');
Route::get('douleur.create', 'DouleurController@create');

Route::resource('evenement', 'EvenementController');
Route::get('evenement.show', 'EvenementController@show');
Route::get('evenement/{all}', 'EvenementController@edit');
Route::get('evenement.destroy', 'EvenementController@destroy');
Route::get('evenement.create', 'EvenementController@create');

Route::resource('maladiechronique', 'MaladiechroniqueController');
Route::get('maladiechronique.show', 'MaladiechroniqueController@show');
Route::get('maladiechronique/{all}', 'MaladiechroniqueController@edit');
Route::get('maladiechronique.destroy', 'MaladiechroniqueController@destroy');
Route::get('maladiechronique.create', 'MaladiechroniqueController@create');

Route::resource('mesure', 'MesureController');
Route::get('mesure.show', 'MesureController@show');
Route::get('mesure/{all}', 'MesureController@edit');
Route::get('mesure.destroy', 'MesureController@destroy');
Route::get('mesure.create', 'MesureController@create');

Route::resource('operation', 'OperationController');
Route::get('operation.show', 'OperationController@show');
Route::get('operation/{all}', 'OperationController@edit');
Route::get('operation.destroy', 'OperationController@destroy');
Route::get('operation.create', 'OperationController@create');

Route::resource('profession', 'ProfessionController');
Route::get('profession.show', 'ProfessionController@show');
Route::get('profession/{all}', 'ProfessionController@edit');
Route::get('profession.destroy', 'ProfessionController@destroy');
Route::get('profession.create', 'ProfessionController@create');

Route::controller('utilisateuradmin', 'UtilisateuradminController');
/*Route::controller('activite', 'ActiviteController');
Route::controller('alimentation', 'AlimentationController');
Route::controller('consultation', 'ConsultationController');
Route::controller('douleur', 'DouleurController');
Route::controller('evenement', 'EvenementController');
Route::controller('maladiechronique', 'MaladiechroniqueController');
Route::controller('mesure', 'MesureController');
Route::controller('operation', 'OperationController');
Route::controller('profession', 'ProfessionController');*/

Route::get('home', '\Bestmomo\Scafold\Http\Controllers\HomeController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');