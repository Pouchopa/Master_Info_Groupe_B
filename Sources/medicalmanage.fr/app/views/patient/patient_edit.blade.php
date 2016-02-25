@extends('app')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">   

            <div class="panel-heading">Modification de l'utilisateur</div>

            <div class="panel-body"> 

                <div class="col-sm-12">

                    {{ Form::model($patient, array('url' => array('patient/update', $patient->id), 'method' => 'put', 'files' => 'true', 'class' => 'form-horizontal panel')) }}

		    <!-- <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">

                        {{ Form::file('photo', null, ['class' => 'form-control']) }}

                        {{ $errors->first('photo', '<small class="help-block">:message</small>') }}

                    </div> !-->

                    <div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">

                        {{ Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) }}

                        {{ $errors->first('nom', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group {{ $errors->has('prenom') ? 'has-error' : '' }}">

                        {{ Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) }}

                        {{ $errors->first('prenom', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

                        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}

                        {{ $errors->first('email', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group">

                        <div class="radio">

                            <label>
                                {{ Form::radio('sexe', 'Homme') }}Homme
                            </label>

                            <label>
                                {{ Form::radio('sexe', 'Femme') }}Femme
                            </label>

                        </div>

                    </div>

                    <div class="form-group {{ $errors->has('date_naissance') ? 'has-error' : '' }}">

                        {{ Form::text('date_naissance', null, ['id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'Date de naissance']) }}

                        {{ $errors->first('date_naissance', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group {{ $errors->has('taux_de_graisse') ? 'has-error' : '' }}">

                        {{ Form::label('taux_de_graisse', 'Taux de graisse :') }}

                        {{ Form::number('taux_de_graisse', null, ['min' => '0', 'max' => '100']) }}

                        {{ $errors->first('taux_de_graisse', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group {{ $errors->has('taux_de_muscle') ? 'has-error' : '' }}">

                        {{ Form::label('taux_de_muscle', 'Taux de muscle :') }}

                        {{ Form::number('taux_de_muscle', null, ['min' => '0', 'max' => '100']) }}

                        {{ $errors->first('taux_de_muscle', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group {{ $errors->has('masse_osseuse') ? 'has-error' : '' }}">

                        {{ Form::label('masse_osseuse', 'Masse osseuse :') }}

                        {{ Form::number('masse_osseuse', null, ['min' => '0', 'max' => '100']) }}

                        {{ $errors->first('masse_osseuse', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group {{ $errors->has('heures_travaillees') ? 'has-error' : '' }}">

                        {{ Form::label('heures_travaillees', "Nombre d'heures travaillées :") }}

                        {{ Form::number('heures_travaillees', null, ['min' => '0', 'max' => '100']) }}

                        {{ $errors->first('heures_travaillees', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group {{ $errors->has('nbr_enfants') ? 'has-error' : '' }}">

                        {{ Form::label('nbr_enfants', "Nombre d'enfants :") }}

                        {{ Form::number('nbr_enfants', null, ['min' => '0', 'max' => '20']) }}

                        {{ $errors->first('nbr_enfants', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group {{ $errors->has('situation_familiale') ? 'has-error' : '' }}">

                        {{ Form::label('situation_familiale', 'Situation familiale :') }}

                        {{ Form::select('situation_familiale', array(
                            'Choississez votre situation familiale',
                            'Célibataire' => 'Célibataire',
                            'En Couple' => 'En Couple',
                            'Marié(e)' => 'Marié(e)',
                            'Pacsé(e)' => 'Pacsé(e)',
                            'Divorcé(e)' => 'Divorcé(e)'
                            )) }}

                        {{ $errors->first('situation_familiale', '<small class="help-block">:message</small>') }}

                    </div>

                    <h4> Activités sportives </h4>
                     <a href="{{url('patientActivite/create')}}">

                        Ajouter une activité sportive

                    </a>

                    <h4> Evènements </h4>
                     <a href="{{url('evenement/create')}}" >

                        Ajouter un évènement

                    </a>

                    <h4> Alimentation </h4>
                     <a href="{{url('alimentation/create')}}">

                        Ajouter une alimentation

                    </a>

                    <h4> Maladie </h4>
                     <a href="{{url('maladiechronique/create')}}" >

                        Ajouter une maladie

                    </a>

                    <h4> Opération </h4>
                     <a href="{{url('operation/create')}}">

                        Ajouter une opération

                    </a>

                    <br />

                    {{ Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) }}

                    {{ Form::close() }}

                </div>

            </div>

        </div>

        <a href="javascript:history.back()" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

        </a>

    </div>

@stop
