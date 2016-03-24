@extends('app')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Modification de la maladie</div>

            <div class="panel-body"> 

                 <div class="col-sm-12">

                    {{ Form::model($patientMaladie, array('url' => array('patientMaladie/update', $patientMaladie->id), 'method' => 'put', 'class' => 'form-horizontal panel')) }}

                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">

                            {{ Form::label('date', 'Date d\'apparition* :') }}

                            {{ Form::text('date', null, ['id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'Date d\'apparition de la maladie']) }}

                            {{ $errors->first('date', '<small class="help-block">:message</small>') }}

                        </div>

                        {{ Form::hidden('patient_id', Auth::user()->id) }}

                        <div class="form-group {{ $errors->has('maladie_id') ? 'has-error' : '' }}">

                            {{ Form::label('maladie_id', 'Maladie* :') }}

                            {{ Form::select('maladie_id', $maladies_options , Input::old('maladie_id')) }}

                            {{ $errors->first('maladie_id', '<small class="help-block">:message</small>') }}

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
