@extends('app')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Demande de prise de rendez-vous</div>

            <div class="panel-body"> 

                 <div class="col-sm-12">

                    {{ Form::open(['url' => 'consultation/ask', 'method' => 'post', 'class' => 'form-horizontal panel']) }} 

                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">

                            {{ Form::label('date', 'Date du rendez-vous * :') }}

                            {{ Form::text('date', null, ['id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'Date du rendez-vous']) }}

                            {{ $errors->first('date', '<small class="help-block">:message</small>') }}

                        </div>

                        <div class="form-group {{ $errors->has('heure') ? 'has-error' : '' }}">

                            {{ Form::label('heure', 'Heure du rendez-vous* :') }}

                            {{ Form::text('heure', null, array('class' => 'form-control', 'placeholder' => 'Entrez l\'heure du rendez-vous')) }}

                            {{ $errors->first('heure', '<small class="help-block">:message</small>') }}

                        </div>

                        <div class="form-group {{ $errors->has('motif') ? 'has-error' : '' }}">

                            {{ Form::label('motif', 'Motif* :') }}

                            {{ Form::text('motif', null, array('class' => 'form-control', 'placeholder' => 'Entrez le motif du rendez-vous')) }}

                            {{ $errors->first('motif', '<small class="help-block">:message</small>') }}

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
