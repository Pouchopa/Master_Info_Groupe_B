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

                    <div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">

                        {{ Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => 'Téléphone']) }}

                        {{ $errors->first('telephone', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group {{ $errors->has('ville_id') ? 'has-error' : '' }}">

                        {{ Form::label('ville_id', 'Opération* :') }}

                        {{ Form::select('ville_id', $villes_options , Input::old('ville_id')) }}

                        {{ $errors->first('ville_id', '<small class="help-block">:message</small>') }}

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

                    <div class="form-group {{ $errors->has('profession_id') ? 'has-error' : '' }}">

                        {{ Form::label('profession_id', 'Profession* :') }}

                        {{ Form::select('profession_id', $professions_options , Input::old('profession_id')) }}

                        {{ $errors->first('profession_id', '<small class="help-block">:message</small>') }}

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
                    @if(count($patientActivites) != 0)
                        @foreach ($patientActivites as $patientActivite)
                            <ul>
                                <li><a href="{{url('patientActivite/edit/' . $patientActivite->id)}}">
                                        {{ $patientActivite->dateDebut }} 
                                            @if($patientActivite->dateFin != null)
                                                 - {{$patientActivite->dateFin}} 
                                            @endif
                                         : {{ $patientActivite->activite->libelle }}
                                    </a>
                                    <a href="{{ url('/patientActivite/delete/' . $patientActivite->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer cette activité ?');">
                                        Supprimer
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    @else
                        Aucune activité enregistrée.
                    @endif
                    <br />
                     <a href="{{url('patientActivite/create')}}">

                        Ajouter une activité sportive

                    </a>

                    <h4> Alimentation </h4>
                     @if(count($patientAlimentations) != 0)
                        @foreach ($patientAlimentations as $patientAlimentation)
                            <ul>
                                <li><a href="{{url('patientAlimentation/edit/' . $patientAlimentation->id)}}">
                                        {{ $patientAlimentation->alimentation->libelle }}
                                    </a>
                                    <a href="{{ url('/patientAlimentation/delete/' . $patientAlimentation->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer cette alimentation ?');">
                                        Supprimer
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    @else
                        Aucune alimentation enregistrée.
                    @endif
                    <br />
                     <a href="{{url('patientAlimentation/create')}}">

                        Ajouter une alimentation

                    </a>

                    <h4> Maladie </h4>
                     @if(count($patientMaladies) != 0)
                        @foreach ($patientMaladies as $patientMaladie)
                            <ul>
                                <li><a href="{{url('patientMaladie/edit/' . $patientMaladie->id)}}">
                                        {{ $patientMaladie->date }} 
                                         : {{ $patientMaladie->maladie->libelle }}
                                    </a>
                                    <a href="{{ url('/patientMaladie/delete/' . $patientMaladie->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer cette maladie ?');">
                                        Supprimer
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    @else
                        Aucune maladie enregistrée.
                    @endif
                    <br />
                     <a href="{{url('patientMaladie/create')}}">

                        Ajouter une maladie

                    </a>

                    <h4> Opération </h4>
                     @if(count($patientOperations) != 0)
                        @foreach ($patientOperations as $patientOperation)
                            <ul>
                                <li><a href="{{url('patientOperation/edit/' . $patientOperation->id)}}">
                                        {{ $patientOperation->date }} 
                                         : {{ $patientOperation->operation->libelle }}
                                    </a>
                                    <a href="{{ url('/patientOperation/delete/' . $patientOperation->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer cette opération ?');">
                                        Supprimer
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    @else
                        Aucune opération enregistrée.
                    @endif
                    <br />
                     <a href="{{url('patientOperation/create')}}">

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
