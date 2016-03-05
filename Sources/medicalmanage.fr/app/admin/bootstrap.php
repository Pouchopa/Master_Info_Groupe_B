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
    ->title('Liste des patients')
    ->as('Patients')
    ->with('ville')
    ->filters(function ()
    {
        ModelItem::filter('ville_id')->title()->from('\App\models\Ville', 'nom');
    })
    ->columns(function ()
    {
        Column::image('photo');
        Column::string('nom', 'Nom');
        Column::string('prenom', 'Prenom');
        Column::string('email', 'E-mail');
        Column::string('sexe', 'Sexe');
        Column::string('numero_tel', 'Telephone');
        Column::count('consultations')->append(
            Column::filter('patient_id')->model(\App\models\Consultation::class)
        );
        Column::count('patientActivites')->append(
            Column::filter('patient_id')->model(\App\models\PatientActivite::class)
        );
        Column::string('ville.nom', 'Ville')->append(Column::filter('ville_id')->value('ville.id'));
    })
    ->form(function ()
    {
        FormItem::text('pseudo', 'Pseudo')->required()->unique();
        FormItem::text('password', 'Mot de passe')->required();
        FormItem::select('ville_id', 'Ville')->list('\App\models\Ville')->required();
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
    ->title('Liste des consultations')
    ->as('Consultations')
    ->with('patient')
    ->filters(function ()
    {
        ModelItem::filter('patient_id')->title()->from('\App\models\Patient', 'email');
        ModelItem::filter('maladie_id')->title()->from('\App\models\Maladie', 'libelle');
    })
    ->columns(function ()
    {
        Column::string('patient.email', 'Patient')->append(Column::filter('patient_id')->value('patient.id'));
        Column::string('maladie.libelle', 'Maladie')->append(Column::filter('maladie_id')->value('maladie.id'));
        Column::date('date', 'Date consultation');
        Column::string('description', 'Description');
        Column::string('commentaireKine', 'Commentaire kine');
        Column::string('commentairePatient', 'Commentaire patient');
    })
    ->form(function ()
    {
        FormItem::select('patient_id', 'Patient')->list('\App\models\Patient')->required();
        FormItem::select('maladie_id', 'Maladie')->list('\App\models\Maladie')->required();
        FormItem::date('date', 'Date consultation')->required();
        FormItem::textarea('description', 'Description')->required();
        FormItem::textarea('commentaireKine', 'Commentaire kine')->required();
        FormItem::textarea('commentairePatient', 'Commentaire patient')->required();
    });

Admin::model(\App\models\Rdv::class)
    ->title('Liste des rendez-vous')
    ->as('Rdvs')
    ->with('patient')
    ->filters(function ()
    {
        ModelItem::filter('patient_id')->title()->from('\App\models\Patient', 'email');
    })
    ->columns(function ()
    {
        Column::string('patient.email', 'Patient')->append(Column::filter('patient_id')->value('patient.id'));
        Column::date('date', 'Date rendez-vous');
        Column::string('heure', 'Heure');
        Column::string('motif', 'Motif');
    })
    ->form(function ()
    {
        FormItem::select('patient_id', 'Patient')->list('\App\models\Patient')->required();
        FormItem::date('date', 'Date rendez-vous')->required();
        FormItem::time('heure', 'Heure')->required();
        FormItem::textarea('motif', 'Motif')->required();
    });

Admin::model(\App\models\Maladie::class)
    ->title('Liste des maladies')
    ->as('Maladies')
    ->columns(function ()
    {
        Column::string('libelle', 'Maladie');
        Column::string('description', 'Description');
    })
    ->form(function ()
    {
        FormItem::text('libelle', 'Maladie')->required();
        FormItem::textarea('description', 'Description')->required();
    });

Admin::model(\App\models\PatientMaladie::class)
    ->title('Patients et leurs maladies')
    ->as('PatientMaladies')
    ->filters(function ()
    {
        ModelItem::filter('patient_id')->title()->from('\App\models\Patient', 'email');
        ModelItem::filter('maladie_id')->title()->from('\App\models\Maladie', 'libelle');
    })
    ->columns(function ()
    {
        Column::string('patient.email', 'Patient')->append(Column::filter('patient_id')->value('patient.id'));
        Column::string('maladie.libelle', 'Maladie')->append(Column::filter('maladie_id')->value('maladie.id'));
    })
    ->form(function ()
    {
        FormItem::select('patient_id', 'Patient')->list('\App\models\Patient')->required();
        FormItem::select('maladie_id', 'Maladie')->list('\App\models\Maladie')->required();
    });

Admin::model(\App\models\Activite::class)
    ->title('Liste des activités')
    ->as('Activites')
    ->columns(function ()
    {
        Column::string('libelle', 'Activité');
    })
    ->form(function ()
    {
        FormItem::text('libelle', 'Activité')->required();
    });

Admin::model(\App\models\PatientActivite::class)
    ->title('Patients et leurs activités')
    ->as('PatientActivites')
    ->filters(function ()
    {
        ModelItem::filter('patient_id')->title()->from('\App\models\Patient', 'email');
        ModelItem::filter('activite_id')->title()->from('\App\models\Activite', 'libelle');
    })
    ->columns(function ()
    {
        Column::string('patient.email', 'Patient')->append(Column::filter('patient_id')->value('patient.id'));
        Column::string('activite.libelle', 'Activite')->append(Column::filter('activite_id')->value('activite.id'));
        Column::date('dateDebut', 'date debut');
        Column::date('dateFin', 'date fin');
        Column::string('description', 'description');
    })
    ->form(function ()
    {
        FormItem::select('patient_id', 'Patient')->list('\App\models\Patient')->required();
        FormItem::select('activite_id', 'Activite')->list('\App\models\Activite')->required();
        FormItem::date('dateDebut', 'date de debut')->required();
        FormItem::date('dateFin', 'date de fin')->required();
        FormItem::textarea('description', 'description')->required();
    });


Admin::model(\App\models\Operation::class)
    ->title('Liste des opérations')
    ->as('Operations')
    ->columns(function ()
    {
        Column::string('libelle', 'Activité');
        Column::string('description', 'Description');
    })
    ->form(function ()
    {
        FormItem::text('libelle', 'Activité')->required();
        FormItem::textarea('description', 'Description')->required();
    });

Admin::model(\App\models\PatientOperation::class)
    ->title('Opérations des patients')
    ->as('PatientOperations')
    ->filters(function ()
    {
        ModelItem::filter('patient_id')->title()->from('\App\models\Patient', 'email');
        ModelItem::filter('operation_id')->title()->from('\App\models\Operation', 'libelle');
    })
    ->columns(function ()
    {
        Column::string('patient.email', 'Patient')->append(Column::filter('patient_id')->value('patient.id'));
        Column::string('operation.libelle', 'Operation')->append(Column::filter('operation_id')->value('operation.id'));
        Column::date('date', 'date');
        Column::string('description', 'Description');
    })
    ->form(function ()
    {
        FormItem::select('patient_id', 'Patient')->list('\App\models\Patient')->required();
        FormItem::select('operation_id', 'Operation')->list('\App\models\Operation')->required();
        FormItem::date('date', 'Date')->required();
        FormItem::textarea('description', 'Description')->required();
    });

Admin::model(\App\models\Ville::class)
    ->title('Liste des villes')
    ->as('Villes')
    ->columns(function ()
    {
        Column::string('nom', 'Ville');
        Column::string('code_postal', 'Code postal');
        Column::string('description', 'Description');
        Column::count('patients')->append(
            Column::filter('ville_id')->model(\App\models\Patient::class)
        );
    })
    ->form(function ()
    {
        FormItem::text('nom', 'Ville')->required();
        FormItem::text('code_postal', 'Code postal')->required();
        FormItem::textarea('description', 'Description')->required();
    });
