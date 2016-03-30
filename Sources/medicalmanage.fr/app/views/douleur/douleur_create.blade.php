@extends('app')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Ajout d'une douleur</div>

            <div class="panel-body"> 

                 <div class="col-sm-12">

                    {{ Form::open(['url' => 'douleur/create', 'method' => 'post', 'class' => 'form-horizontal panel']) }} 

                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">

                            {{ Form::label('date', 'Date de la douleur * :') }}

                            {{ Form::text('date', null, ['id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'Date d\'apparition de la douleur']) }}

                            {{ $errors->first('date', '<small class="help-block">:message</small>') }}

                        </div>

                        <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">

                            {{ Form::label('position', 'Position* :') }}

                            {{ Form::text('position', null, array('class' => 'form-control', 'placeholder' => 'Entrez la position de la douleur')) }}

                            {{ $errors->first('position', '<small class="help-block">:message</small>') }}

                        </div>

                        <div class="form-group {{ $errors->has('intensite') ? 'has-error' : '' }}">

                            {{ Form::label('intensite', 'Intensité* :') }}

                            {{ Form::text('intensite', null, array('class' => 'form-control', 'placeholder' => 'Entrez l\'intensité de la douleur')) }}

                            {{ $errors->first('intensite', '<small class="help-block">:message</small>') }}

                        </div>


                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">

                            {{ Form::label('description', 'Description* :') }}

                            {{ Form::text('description', null, array('class' => 'form-control', 'placeholder' => 'Entrez la description de l\'activité')) }}

                            {{ $errors->first('description', '<small class="help-block">:message</small>') }}

                        </div>

                        {{ Form::hidden('patient_id', Auth::user()->id) }}

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
