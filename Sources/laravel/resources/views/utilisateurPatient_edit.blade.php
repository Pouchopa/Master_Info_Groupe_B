@extends('template')


@section('contenu')

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

                        {!! Form::number('taux_de_graisse', null) !!}

                        {!! $errors->first('taux_de_graisse', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('taux_de_muscle') ? 'has-error' : '' !!}">

                        {!! Form::label('taux_de_muscle', 'Taux de muscle :') !!}

                        {!! Form::number('taux_de_muscle', null) !!}

                        {!! $errors->first('taux_de_muscle', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('masse_osseuse') ? 'has-error' : '' !!}">

                        {!! Form::label('masse_osseuse', 'Masse osseuse :') !!}

                        {!! Form::number('masse_osseuse', null) !!}

                        {!! $errors->first('masse_osseuse', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('heures_travaillees') ? 'has-error' : '' !!}">

                        {!! Form::label('heures_travaillees', "Nombre d'heures travaillées :") !!}

                        {!! Form::number('heures_travaillees', null) !!}

                        {!! $errors->first('heures_travaillees', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('nbr_enfants') ? 'has-error' : '' !!}">

                        {!! Form::label('nbr_enfants', "Nombre d'enfants :") !!}

                        {!! Form::number('nbr_enfants', null) !!}

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