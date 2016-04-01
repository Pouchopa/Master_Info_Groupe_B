@extends('app')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Ajout d'un commentaire patient</div>

            <div class="panel-body"> 

                 <div class="col-sm-12">

                    {{ Form::model($consultation, array('url' => array('consultation/update', $consultation->id), 'method' => 'put', 'class' => 'form-horizontal panel')) }}

                        <div class="form-group {{ $errors->has('commentairePatient') ? 'has-error' : '' }}">

                            {{ Form::label('commentairePatient', 'Commentaire* :') }}

                            {{ Form::text('commentairePatient', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre commentaire sur la consultation')) }}

                            {{ $errors->first('commentairePatient', '<small class="help-block">:message</small>') }}

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
