@extends('template')


@section('contenu')

    <br>

    <div class="col-sm-offset-4 col-sm-4">

        <div class="panel panel-info">

            <div class="panel-heading">Inscription d'un utilisateur</div>

            <div class="panel-body"> 

                {!! Form::open(array('url' => 'utilisateurpatient/form')) !!}

                    <div class="form-group {!! $errors->has('pseudo') ? 'has-error' : '' !!}">

                        {!! Form::text('pseudo', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre pseudo')) !!}

                        {!! $errors->first('pseudo', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('mot_de_passe') ? 'has-error' : '' !!}">

                        {!! Form::label('mot_de_passe', 'Mot de passe :') !!}

                        {!! Form::password('mot_de_passe', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre mot de passe')) !!}

                        {!! $errors->first('mot_de_passe', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">

                        {!! Form::text('nom', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre nom')) !!}

                        {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">

                        {!! Form::text('prenom', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre prénom')) !!}

                        {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('sexe') ? 'has-error' : '' !!}">

                            {!! Form::checkbox('sexe', 'H') !!}

                            {!! Form::label('Homme') !!}

                            {!! Form::checkbox('sexe', 'F') !!}

                            {!! Form::label('Femme') !!}

                        {!! $errors->first('sexe', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('date_naissance') ? 'has-error' : '' !!}">

                        {!! Form::date('date_naissance', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre date de naissance')) !!}

                        {!! $errors->first('date_naissance', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">

                        {!! Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre email')) !!}

                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('taux_de_graisse') ? 'has-error' : '' !!}">

                        {!! Form::label('taux_de_graisse', 'Taux de graisse') !!}

                        {!! Form::number('taux_de_graisse', null) !!}

                        {!! $errors->first('taux_de_graisse', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('taux_de_muscle') ? 'has-error' : '' !!}">

                        {!! Form::label('taux_de_muscle', 'Taux de muscle') !!}

                        {!! Form::number('taux_de_muscle', null) !!}

                        {!! $errors->first('taux_de_muscle', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('masse_osseuse') ? 'has-error' : '' !!}">

                        {!! Form::label('masse_osseuse', 'Masse osseuse') !!}

                        {!! Form::number('masse_osseuse', null) !!}

                        {!! $errors->first('masse_osseuse', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('heures_travaillees') ? 'has-error' : '' !!}">

                        {!! Form::label('heures_travaillees', "Nombre d'heures travaillées") !!}

                        {!! Form::number('heures_travaillees', null) !!}

                        {!! $errors->first('heures_travaillees', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('nbr_enfants') ? 'has-error' : '' !!}">

                        {!! Form::label('nbr_enfants', "Nombre d'enfants") !!}

                        {!! Form::number('nbr_enfants', null) !!}

                        {!! $errors->first('nbr_enfants', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('situation_familiale') ? 'has-error' : '' !!}">

                        {!! Form::label('situation_familiale', 'Situation familiale :') !!}

                        {!! Form::select('situation_familiale', array(
                            'Célibataire' => 'Célibataire',
                            'En Couple' => 'En Couple',
                            'Marié(e)' => 'Marié(e)',
                            'Pacsé(e)' => 'Pacsé(e)',
                            'Divorcé(e)' => 'Divorcé(e)'
                            )) !!}

                        {!! $errors->first('situation_familiale', '<small class="help-block">:message</small>') !!}

                    </div>

                    {!! Form::submit('Envoyer !', array('class' => 'btn btn-info pull-right')) !!}

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@stop
