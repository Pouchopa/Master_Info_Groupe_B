<?php

/*
 * Describe you custom columns and form items here.
 *
 * There is some simple examples what you can use:
 *
 *		Column::register('customColumn', '\Foo\Bar\MyCustomColumn');
 *
 * 		FormItem::register('customElement', \Foo\Bar\MyCustomElement::class);
 *
 * 		FormItem::register('otherCustomElement', function (\Eloquent $model)
 * 		{
 *			AssetManager::addStyle(URL::asset('css/style-to-include-on-page-with-this-element.css'));
 *			AssetManager::addScript(URL::asset('js/script-to-include-on-page-with-this-element.js'));
 * 			if ($model->exists)
 * 			{
 * 				return 'My edit code.';
 * 			}
 * 			return 'My custom element code';
 * 		});
 */
Admin::model(\App\models\Patient::class)
    ->title('Patients')
    ->as('Patients')
    ->columns(function ()
    {
        Column::image('photo');
        Column::string('pseudo', 'Pseudo');
        Column::string('nom', 'Nom');
        Column::string('prenom', 'Prenom');
        Column::string('email', 'E-mail');
        Column::string('sexe', 'Sexe');
        Column::date('date_naissance', 'Date de naissance')->format('medium', 'none');
        Column::string('situation_familiale', 'Situation familiale');
        Column::string('numero_tel', 'Telephone');
        Column::count('consultations', 'Consultations')->append(Column::filter('patient_id')->model('\App\models\Consultation'));
    })
    ->form(function ()
    {
        FormItem::text('pseudo', 'Pseudo')->required()->unique();
        FormItem::text('password', 'Mot de passe')->required();
        FormItem::text('nom', 'Nom')->required();
        FormItem::text('prenom', 'Prénom')->required();
        FormItem::image('photo', 'Photo')->required();
        FormItem::text('email', 'E-mail')->required()->unique();
        FormItem::text('numero_tel', 'Téléphone')->required();
        FormItem::select('sexe', 'Sexe')->list(['Homme'=>'Homme','Femme'=>'Femme','Autre'=>'Autre'])->required();
        FormItem::date('date_naissance', 'Date de naissance')->required();
        FormItem::select('situation_familiale', 'Situation familiale')->list(['Marié(e)'=>'Marié(e)','Divorcé(e)'=>'Divorcé(e)','Pacsé(e)'=>'Pacsé(e)', 'En couple'=>'En couple', 'Célibataire'=>'Célibataire', 'Autre'=>'Autre'])->required();
        FormItem::text('nbr_enfants', 'Nombre d\'enfants');
    });

Admin::model(\App\models\Consultation::class)
    ->title('Consultations')
    ->as('Consultations')
    ->with('patient')
    ->filters(function ()
    {
        ModelItem::filter('patient_id')->title()->from('\App\models\Patient', 'email');
    })
    ->columns(function ()
    {
        Column::string('patient.email', 'Patient')->append(Column::filter('patient_id')->value('patient.id'));
        Column::date('date', 'Date consultation')->format('medium', 'none');
        Column::string('description', 'Description');
        Column::string('commentaireKine', 'Commentaire kine');
        Column::string('commentairePatient', 'Commentaire patient');
    })
    ->form(function ()
    {
        FormItem::select('patient_id', 'Patient')->list('\App\models\Patient')->required();
        FormItem::date('date', 'Date consultation')->required();
        FormItem::textarea('description', 'Description')->required();
        FormItem::textarea('commentaireKine', 'Commentaire kine')->required();
        FormItem::textarea('commentairePatient', 'Commentaire patient')->required();
    });

Admin::model(\App\models\Activite::class)
    ->title('Activite')
    ->as('Activites')
    ->async()
    ->columns(function ()
    {
        Column::string('libelle', 'Activité');
    })
    ->form(function ()
    {
        FormItem::text('libelle', 'Activité')->required();
    });

Admin::model(\App\models\PatientActivite::class)
    ->title('PatientActivite')
    ->as('PatientActivites')
    ->async()
    ->columns(function ()
    {
        Column::string('patient_id', 'Patient');
        Column::string('activite_id', 'Activite');
        Column::date('dateDebut', 'date de debut')->format('medium', 'none');
        Column::date('dateFin', 'date de fin')->format('medium', 'none');
    })
    ->form(function ()
    {
        FormItem::text('patient_id', 'Patient')->required();
        FormItem::text('activite_id', 'Activite')->required();
        FormItem::date('dateDebut', 'date de debut')->required();
        FormItem::date('dateFin', 'date de fin')->required();
        FormItem::ckeditor('description', 'description')->required();
    });

