@extends('app')


@section('content')

    <div class="col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-4 col-lg-offset-2 col-lg-8">

        <br>

        <div class="panel panel-primary">   

            <div class="panel-heading">Fiche utilisateur</div>

            <div class="panel-body"> 

                @if(!empty($patient->photo))
                    <span class="pull-right"><img src="{{ URL::to('/') }}/images/patients/{{$patient->photo }}" height="120px" width="160px" /></span>
                @endif

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

                @if($patient->telephone != 0)
                    <p>Téléphone : {{ $patient->telephone }}</p>
                @endif

                @if($patient->ville != null)
                    <p>Ville : {{ $patient->ville }}</p>
                @endif

                @if($patient->profession != null)
                    <p>Profession : {{ $patient->profession }}</p>
                @endif

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
                @if(count($patientActivites) != 0)
                    @foreach ($patientActivites as $patientActivite)
                        <ul>
                            <li>{{ $patientActivite->dateDebut }} 
                                    @if($patientActivite->dateFin != null)
                                         - {{$patientActivite->dateFin}} 
                                    @endif
                                 : {{ $patientActivite->activite->libelle }}</li>
                        </ul>
                    @endforeach
                @else
                    Aucune activité enregistrée.
                @endif

                <h4> Alimentation </h4>
                 @if(count($patientAlimentations) != 0)
                    @foreach ($patientAlimentations as $patientAlimentation)
                        <ul>
                            <li>{{ $patientAlimentation->alimentation->libelle }}</li>
                        </ul>
                    @endforeach
                @else
                    Aucune alimentation enregistrée.
                @endif

                <h4> Maladie </h4>
                 @if(count($patientMaladies) != 0)
                    @foreach ($patientMaladies as $patientMaladie)
                        <ul>
                            <li>{{ $patientMaladie->maladie->libelle }} : 
                                {{ $patientMaladie->description }}</li>
                        </ul>
                    @endforeach
                @else
                    Aucune maladie enregistrée.
                @endif

                <h4> Opération </h4>
                 @if(count($patientOperations) != 0)
                    @foreach ($patientOperations as $patientOperation)
                        <ul>
                            <li>{{ $patientOperation->operation->libelle }}
                                 : {{ $patientOperation->description }} </li>
                        </ul>
                    @endforeach
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
