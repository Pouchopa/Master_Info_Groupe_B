@extends('app')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Ajout d'une opération</div>

            <div class="panel-body"> 

                 <div class="col-sm-12">

                    {{ Form::open(['url' => 'activite/create', 'method' => 'post', 'class' => 'form-horizontal panel']) }} 

                        <div class="form-group {{ $errors->has('libelle') ? 'has-error' : '' }}">

                            {{ Form::label('libelle', 'Libellé* :') }}

                            {{ Form::text('libelle', null, array('class' => 'form-control', 'placeholder' => 'Entrez le libellé de l\'opération')) }}

                            {{ $errors->first('libelle', '<small class="help-block">:message</small>') }}

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
