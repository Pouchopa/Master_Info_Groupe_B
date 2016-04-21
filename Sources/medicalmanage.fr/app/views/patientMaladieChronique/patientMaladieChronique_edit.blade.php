@extends('app')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Modification de la maladie</div>

            <div class="panel-body"> 

                 <div class="col-sm-12">

                    {{ Form::model($patientMaladieChronique, array('url' => array('patientMaladieChronique/update', $patientMaladieChronique->id), 'method' => 'put', 'class' => 'form-horizontal panel')) }}

                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">

                            {{ Form::label('description', 'Description* :') }}

                            {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Description de la maladie']) }}

                            {{ $errors->first('description', '<small class="help-block">:message</small>') }}

                        </div>

                        {{ Form::hidden('patient_id', Auth::user()->id) }}

                        <div class="form-group {{ $errors->has('maladieChronique_id') ? 'has-error' : '' }}">

                            {{ Form::label('maladieChronique_id', 'Maladie* :') }}

                            {{ Form::select('maladieChronique_id', $maladies_options , Input::old('maladieChronique_id')) }}

                            {{ $errors->first('maladieChronique_id', '<small class="help-block">:message</small>') }}

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
