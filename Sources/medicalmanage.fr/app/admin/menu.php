<?php

/*
 * Describe your menu here.
 *
 * There is some simple examples what you can use:
 *
 * 		Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard')->uses('\AdminController@getIndex');
 * 		Admin::menu(User::class)->icon('fa-user');
 * 		Admin::menu()->label('Menu with subitems')->icon('fa-book')->items(function ()
 * 		{
 * 			Admin::menu(\Foo\Bar::class)->icon('fa-sitemap');
 * 			Admin::menu('\Foo\Baz')->label('Overwrite model title');
 * 			Admin::menu()->url('my-page')->label('My custom page')->uses('\MyController@getMyPage');
 * 		});
 */

Admin::menu()->url('/')->label('Page d\'accueil')->icon('fa-dashboard')->uses('\SleepingOwl\Admin\Controllers\DummyController@getIndex');
Admin::menu(\App\models\Patient::class)->icon('fa-users');
Admin::menu(\App\models\Consultation::class)->icon('fa-folder-o');
Admin::menu(\App\models\Rdv::class)->icon('fa fa-calendar');
Admin::menu(\App\models\Maladie::class)->icon('fa fa-medkit');
Admin::menu(\App\models\Operation::class)->icon('fa fa-ambulance');
Admin::menu(\App\models\PatientOperation::class)->icon('fa fa-ambulance');
Admin::menu(\App\models\Activite::class)->icon('fa fa-life-ring');
Admin::menu(\App\models\PatientActivite::class)->icon('fa fa-life-ring');
Admin::menu(\App\models\MaladieChronique::class)->icon('fa fa-globe');
Admin::menu(\App\models\PatientMaladieChronique::class)->icon('fa fa-globe');
Admin::menu(\App\models\Profession::class)->icon('fa fa-briefcase');
Admin::menu(\App\models\Ville::class)->icon('fa fa-globe');