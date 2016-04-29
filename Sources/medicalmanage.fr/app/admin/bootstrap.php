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
    ->with('profession')
    ->filters(function ()
    {
        ModelItem::filter('ville_id')->title()->from('\App\models\Ville', 'nom');
        ModelItem::filter('profession_id')->title()->from('\App\models\Profession', 'libelle');
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
        Column::string('profession.libelle', 'Profession')->append(Column::filter('profession_id')->value('profession.id'));
    })
    ->form(function ()
    {
        FormItem::text('pseudo', 'Pseudo')->required()->unique();
        FormItem::text('password', 'Mot de passe')->required();
        FormItem::select('ville_id', 'Ville')->list('\App\models\Ville')->required();
        FormItem::select('profession_id', 'Profession')->list('\App\models\Profession')->required();
        FormItem::text('nom', 'Nom')->required();
        FormItem::text('prenom', 'Prénom')->required();
        FormItem::image('photo', 'Photo')->required();
        FormItem::text('email', 'E-mail')->required()->unique();
        FormItem::text('numero_tel', 'Téléphone')->required()->unique();
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
        ModelItem::filter('acte_id')->title()->from('\App\models\Acte', 'libelle');
    })
    ->columns(function ()
    {
        Column::string('patient.email', 'Patient')->append(Column::filter('patient_id')->value('patient.id'));
        Column::string('maladie.libelle', 'Maladie')->append(Column::filter('maladie_id')->value('maladie.id'));
        Column::string('acte.libelle', 'Acte')->append(Column::filter('acte_id')->value('acte.id'));
        Column::date('date', 'Date consultation');
        Column::string('description', 'Description');
        Column::string('commentaireKine', 'Commentaire kine');
        Column::string('commentairePatient', 'Commentaire patient');
    })
    ->form(function ()
    {
        FormItem::select('patient_id', 'Patient')->list('\App\models\Patient')->required();
        FormItem::select('maladie_id', 'Maladie')->list('\App\models\Maladie')->required();
        FormItem::select('acte_id', 'Acte')->list('\App\models\Acte')->required();
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
        FormItem::time('heure', 'Heure')->required()->unique();
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

Admin::model(\App\models\Acte::class)
    ->title('Liste des actes')
    ->as('Actes')
    ->columns(function ()
    {
        Column::string('libelle', 'Actes');
    })
    ->form(function ()
    {
        FormItem::text('libelle', 'Acte')->required()->unique();
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

Admin::model(\App\models\PatientMaladieChronique::class)
    ->title('Patients et leurs maladie chronique')
    ->as('PatientMaladieChroniques')
    ->filters(function ()
    {
        ModelItem::filter('patient_id')->title()->from('\App\models\Patient', 'email');
        ModelItem::filter('maladieChronique_id')->title()->from('\App\models\MaladieChronique', 'libelle');
    })
    ->columns(function ()
    {
        Column::string('patient.email', 'Patient')->append(Column::filter('patient_id')->value('patient.id'));
        Column::string('maladieChronique.libelle', 'MaladieChronique')->append(Column::filter('maladieChronique_id')->value('maladieChronique.id'));
    })
    ->form(function ()
    {
        FormItem::select('patient_id', 'Patient')->list('\App\models\Patient')->required();
        FormItem::select('maladieChronique_id', 'MaladieChronique')->list('\App\models\MaladieChronique')->required();
    });

Admin::model(\App\models\MaladieChronique::class)
    ->title('Liste des maladies chronique')
    ->as('MaladieChroniques')
    ->columns(function ()
    {
        Column::string('libelle', 'Maladie');
        Column::string('description', 'description');
    })
    ->form(function ()
    {
        FormItem::text('libelle', 'Maladie')->required();
        FormItem::textarea('description', 'description')->required();
    });

Admin::model(\App\models\Operation::class)
    ->title('Liste des opérations')
    ->as('Operations')
    ->columns(function ()
    {
        Column::string('libelle', 'Operation');
        Column::string('description', 'Description');
    })
    ->form(function ()
    {
        FormItem::text('libelle', 'Opération')->required();
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

Admin::model(\App\models\Profession::class)
    ->title('Liste des professions')
    ->as('Professions')
    ->columns(function ()
    {
        Column::string('libelle', 'Profession');
        Column::count('patients')->append(
            Column::filter('profession_id')->model(\App\models\Patient::class)
        );
    })
    ->form(function ()
    {
        FormItem::text('libelle', 'Profession')->required()->unique();
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
        FormItem::text('nom', 'Ville')->required()->unique();
        FormItem::text('code_postal', 'Code postal')->required()->unique();
        FormItem::textarea('description', 'Description')->required()->unique();
    });
