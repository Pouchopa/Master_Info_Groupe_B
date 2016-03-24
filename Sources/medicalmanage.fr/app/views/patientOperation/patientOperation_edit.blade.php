@extends('app')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Modification de l'opération</div>

            <div class="panel-body"> 

                 <div class="col-sm-12">

                    {{ Form::model($patientOperation, array('url' => array('patientOperation/update', $patientOperation->id), 'method' => 'put', 'class' => 'form-horizontal panel')) }}

                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">

                            {{ Form::label('date', 'Date d\'opération* :') }}

                            {{ Form::text('date', null, ['id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'Date de l\'opération']) }}

                            {{ $errors->first('date', '<small class="help-block">:message</small>') }}

                        </div>

                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">

                            {{ Form::label('description', 'Description* :') }}

                            {{ Form::text('description', null, array('class' => 'form-control', 'placeholder' => 'Entrez la description de l\'opération')) }}

                            {{ $errors->first('description', '<small class="help-block">:message</small>') }}

                        </div>

                        {{ Form::hidden('patient_id', Auth::user()->id) }}

                        <div class="form-group {{ $errors->has('operation_id') ? 'has-error' : '' }}">

                            {{ Form::label('operation_id', 'Opération* :') }}

                            {{ Form::select('operation_id', $operations_options , Input::old('operation_id')) }}

                            {{ $errors->first('operation_id', '<small class="help-block">:message</small>') }}

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
