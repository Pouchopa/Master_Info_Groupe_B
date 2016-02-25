@extends('app')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">   

            <div class="panel-heading">Fiche utilisateur</div>

            <div class="panel-body"> 

                <span class="pull-right"><img src="{{ URL::to('/') }}/images/patients/{{$patient->photo }}" height="120px" width="160px" /></span>

                <p>Pseudo : {{ $patient->pseudo }}</p>

                <p>Nom : {{ $patient->nom }}</p>

                <p>Prénom : {{ $patient->prenom }}</p>

                @if($patient->sexe == 'Homme')
                    <p>Sexe : Homme</p>
                @else
                    <p>Sexe : Femme</p>
                @endif

                <p>Date de naissance : {{ $patient->date_naissance }}</p>

                <p>Email : {{ $patient->email }}</p>

                @if($patient->taux_de_graisse != 0)
                    <p>Taux de graisse : {{ $patient->taux_de_graisse }}</p>
                @endif

                @if($patient->taux_de_muscle != 0)
                    <p>Taux de muscle : {{ $patient->taux_de_muscle }}</p>
                @endif

                @if($patient->masse_osseuse != 0)
                    <p>Masse osseuse : {{ $patient->masse_osseuse }}</p>
                @endif

                @if($patient->heures_travaillées != 0)
                    <p>Nombres d'heures travaillées : {{ $patient->heures_travaillées }}</p>
                @endif

                <p>Nombre d'enfants : {{ $patient->nbr_enfants }}</p>

                @if($patient->situation_familiale != 0)
                    <p>Situation familiale : {{ $patient->situation_familiale }}</p>
                @endif

                <h4> Activités sportives </h4>
                @if($activitePatient != null)
                    <ul>
                            <li>{{ $activitePatient->date_debut }} : {{ $activite->libelle_activite }}</li>
                    </ul>
                @else
                    Aucune activité enregistrée.
                @endif

                <h4> Evènements </h4>
                @if($evenementPatient != null)
                    <ul>
                            <li>{{ $evenementPatient->date_evenement }} : {{ $evenement->libelle_evenement }}</li>
                    </ul>
                @else
                    Aucun évènement enregistré.
                @endif

                <h4> Alimentation </h4>

                <h4> Maladie </h4>
                @if($maladiePatient != null)
                    <ul>
                        <li>{{ $maladiePatient->date_maladie }} : {{ $maladie->libelle_maladie }}</li>
                    </ul>
                @else
                    Aucune maladie enregistrée.
                @endif    

                <h4> Opération </h4>
                @if($operationPatient != null)
                    <ul>
                        <li>{{ $operationPatient->date_operation }} : {{ $operation->libelle_operation }}</li>
                    </ul>
                @else
                    Aucune opération enregistrée.
                @endif

            </div>

        </div>              

        <a href="javascript:history.back()" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

        </a>

	    <a href="{{ url('/patient/edit') }}" class="btn btn-warning">
        
            <span class="glyphicon glyphicon-pencil"></<span> Modifier
        
        </a>

        <a href="{{ url('/patient/delete/' . Auth::user()->id) }}" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer votre compte ?');">
        
            <span class="glyphicon glyphicon-remove"></<span> Supprimer
        
        </a>

    </div>

@stop
