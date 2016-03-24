@extends('app')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Modification de l'alimentation</div>

            <div class="panel-body"> 

                 <div class="col-sm-12">

                    {{ Form::model($patientAlimentation, array('url' => array('patientAlimentation/update', $patientAlimentation->id), 'method' => 'put', 'class' => 'form-horizontal panel')) }}

                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">

                            {{ Form::label('description', 'Description* :') }}

                            {{ Form::text('description', null, array('class' => 'form-control', 'placeholder' => 'Entrez la description de l\'alimentation')) }}

                            {{ $errors->first('description', '<small class="help-block">:message</small>') }}

                        </div>

                        {{ Form::hidden('patient_id', Auth::user()->id) }}

                        <div class="form-group {{ $errors->has('alimentation_id') ? 'has-error' : '' }}">

                            {{ Form::label('alimentation_id', 'Alimentation* :') }}

                            {{ Form::select('alimentation_id', $alimentations_options , Input::old('alimentation_id')) }}

                            {{ $errors->first('alimentation_id', '<small class="help-block">:message</small>') }}

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
