@extends('appl')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">   

            <div class="panel-heading">Modification d'un utilisateur</div>

            <div class="panel-body"> 

                <div class="col-sm-12">

                    {!! Form::model($utilisateurPatient, ['route' => ['utilisateurpatient.update', $utilisateurPatient->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}

                    <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">

                        {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}

                        {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">

                        {!! Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}

                        {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">

                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}

                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group">

                        <div class="checkbox">

                            <label>
                                {!! Form::checkbox('sexe', 'H') !!}Homme
                            </label>

                            <label>
                                {!! Form::checkbox('sexe', 'F') !!}Femme
                            </label>

                        </div>

                    </div>

                    <div class="form-group {!! $errors->has('date_naissance') ? 'has-error' : '' !!}">

                        {!! Form::date('date_naissance', null, ['class' => 'form-control', 'placeholder' => 'Date de naissance']) !!}

                        {!! $errors->first('date_naissance', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('taux_de_graisse') ? 'has-error' : '' !!}">

                        {!! Form::label('taux_de_graisse', 'Taux de graisse :') !!}

                        {!! Form::number('taux_de_graisse', null, ['min' => '0'], ['max' => '100']) !!}

                        {!! $errors->first('taux_de_graisse', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('taux_de_muscle') ? 'has-error' : '' !!}">

                        {!! Form::label('taux_de_muscle', 'Taux de muscle :') !!}

                        {!! Form::number('taux_de_muscle', null, ['min' => '0'], ['max' => '100']) !!}

                        {!! $errors->first('taux_de_muscle', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('masse_osseuse') ? 'has-error' : '' !!}">

                        {!! Form::label('masse_osseuse', 'Masse osseuse :') !!}

                        {!! Form::number('masse_osseuse', null, ['min' => '0']) !!}

                        {!! $errors->first('masse_osseuse', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('heures_travaillees') ? 'has-error' : '' !!}">

                        {!! Form::label('heures_travaillees', "Nombre d'heures travaillées :") !!}

                        {!! Form::number('heures_travaillees', null, ['min' => '0']) !!}

                        {!! $errors->first('heures_travaillees', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('nbr_enfants') ? 'has-error' : '' !!}">

                        {!! Form::label('nbr_enfants', "Nombre d'enfants :") !!}

                        {!! Form::number('nbr_enfants', null, ['min' => '0']) !!}

                        {!! $errors->first('nbr_enfants', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('situation_familiale') ? 'has-error' : '' !!}">

                        {!! Form::label('situation_familiale', 'Situation familiale :') !!}

                        {!! Form::select('situation_familiale', array(
                            'Choississez votre situation familiale',
                            'Célibataire' => 'Célibataire',
                            'En Couple' => 'En Couple',
                            'Marié(e)' => 'Marié(e)',
                            'Pacsé(e)' => 'Pacsé(e)',
                            'Divorcé(e)' => 'Divorcé(e)'
                            )) !!}

                        {!! $errors->first('situation_familiale', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('profession_id') ? 'has-error' : '' !!}">

                        {!! Form::label('profession_id', "Profession :") !!}

                        {!! Form::select('profession_id', array(
                            'Choississez votre profession',
                            '0' => 'Inconnue',
                            '1' => 'Informaticien'
                            )) !!}

                        {!! $errors->first('profession_id', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('ville_id') ? 'has-error' : '' !!}">

                        {!! Form::label('ville_id', "Ville :") !!}

                        {!! Form::select('ville_id', array(
                            'Choississez votre profession',
                            '0' => 'Inconnue',
                            '4' => 'Plobsheim'
                            )) !!}

                        {!! $errors->first('ville_id', '<small class="help-block">:message</small>') !!}

                    </div>

                <h4> Activités sportives </h4>
                {!! link_to_route('activite.create', 'Ajouter une activité sportive') !!}

                <h4> Evènements </h4>
                {!! link_to_route('evenement.create', 'Ajouter un évènement') !!}

                <h4> Alimentation </h4>
                {!! link_to_route('alimentation.create', 'Ajouter une alimentation') !!}

                <h4> Maladie </h4>
                {!! link_to_route('maladiechronique.create', 'Ajouter une maladie') !!}

                <h4> Opération </h4>
                {!! link_to_route('operation.create', 'Ajouter une opération') !!}


                    {!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}

                    {!! Form::close() !!}

                </div>

            </div>

        </div>

        <a href="javascript:history.back()" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

        </a>

    </div>

@stop