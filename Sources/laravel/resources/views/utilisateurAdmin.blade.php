@extends('template')


@section('contenu')

    <br>

    <div class="col-sm-offset-4 col-sm-4">

        <div class="panel panel-info">

            <div class="panel-heading">Inscription d'un administrateur</div>

            <div class="panel-body"> 

                {!! Form::open(array('url' => 'utilisateuradmin/form')) !!}

                    <div class="form-group {!! $errors->has('pseudo') ? 'has-error' : '' !!}">

                        {!! Form::label('pseudo', 'Pseudo* :') !!}

                        {!! Form::text('pseudo', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre pseudo')) !!}

                        {!! $errors->first('pseudo', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('mot_de_passe') ? 'has-error' : '' !!}">

                        {!! Form::label('mot_de_passe', 'Mot de passe* :') !!}

                        {!! Form::password('mot_de_passe', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre mot de passe')) !!}

                        {!! $errors->first('mot_de_passe', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">

                        {!! Form::label('nom', 'Nom* :') !!}

                        {!! Form::text('nom', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre nom')) !!}

                        {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">

                        {!! Form::label('prenom', 'Prénom* :') !!}

                        {!! Form::text('prenom', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre prénom')) !!}

                        {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}

                    </div>
                   
                    <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">

                        {!! Form::label('email', 'E-mail* :') !!}

                        {!! Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre email')) !!}

                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}

                    </div>

                    {!! Form::submit('Envoyer !', array('class' => 'btn btn-info pull-right')) !!}

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@stop
