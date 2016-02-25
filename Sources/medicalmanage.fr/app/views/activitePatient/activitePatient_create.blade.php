@extends('app')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Ajout d'une activité</div>

            <div class="panel-body"> 

                 <div class="col-sm-12">

                    {{ Form::open(['url' => 'activitePatient/create', 'method' => 'post', 'class' => 'form-horizontal panel']) }} 

                        <div class="form-group {{ $errors->has('dateDebut') ? 'has-error' : '' }}">

                            {{ Form::label('dateDebut', 'Date de début* :') }}

                            {{ Form::text('dateDebut', null, ['id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'Date de début']) }}

                            {{ $errors->first('dateDebut', '<small class="help-block">:message</small>') }}

                        </div>

                        <div class="form-group {{ $errors->has('dateFin') ? 'has-error' : '' }}">

                            {{ Form::label('dateFin', 'Date de fin :') }}

                            {{ Form::text('dateFin', null, ['id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'Date de fin']) }}

                            {{ $errors->first('dateFin', '<small class="help-block">:message</small>') }}

                        </div>

                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">

                            {{ Form::label('description', 'Description* :') }}

                            {{ Form::text('description', null, array('class' => 'form-control', 'placeholder' => 'Entrez la description de l\'activité')) }}

                            {{ $errors->first('description', '<small class="help-block">:message</small>') }}

                        </div>

                        {{ Form::hidden('patient_id', Auth::user()->id) }}

                        <div class="form-group {{ $errors->has('activite_id') ? 'has-error' : '' }}">

                            {{ Form::label('activite_id', 'Activité* :') }}

                            {{ Form::text('activite_id', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre activite')) }}

                            {{ $errors->first('activite_id', '<small class="help-block">:message</small>') }}

                        </div>

                        {{ Form::hidden('_token', csrf_token()) }}

                        
                    {{ Form::submit('Envoyer !', array('class' => 'btn btn-primary pull-right')) }}

                    {{ Form::close() }}
                </div>

            </div>

        </div>

        <a href="javascript:history.back()" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

        </a>

    </div>

@stop
