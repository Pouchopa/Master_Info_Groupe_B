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
Admin::menu(\App\models\Consultation::class)->icon('fa fa-calendar');
Admin::menu(\App\models\Maladie::class)->icon('fa fa-medkit');
Admin::menu(\App\models\PatientMaladie::class)->icon('fa fa-medkit');
Admin::menu(\App\models\Activite::class)->icon('fa fa-calendar');
Admin::menu(\App\models\PatientActivite::class)->icon('fa fa-calendar');