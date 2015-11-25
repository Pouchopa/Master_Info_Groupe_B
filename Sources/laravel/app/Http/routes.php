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
Route::get('utilisateurpatient.show', 'UtilisateurpatientControllerController@show');
Route::get('utilisateurpatient/{all}', 'UtilisateurpatientControllerController@edit');
Route::get('utilisateurpatient.destroy', 'UtilisateurpatientControllerController@destroy');
Route::get('utilisateurpatient.create', 'UtilisateurpatientControllerController@create');

Route::controller('utilisateuradmin', 'UtilisateuradminController');
Route::controller('activite', 'ActiviteController');
Route::controller('alimentation', 'AlimentationController');
Route::controller('consultation', 'ConsultationController');
Route::controller('douleur', 'DouleurController');
Route::controller('evenement', 'EvenementController');
Route::controller('maladiechronique', 'MaladiechroniqueController');
Route::controller('mesure', 'MesureController');
Route::controller('operation', 'OperationController');
Route::controller('profession', 'ProfessionController');
Route::controller('ville', 'VilleController');