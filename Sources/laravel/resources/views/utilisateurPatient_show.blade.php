@extends('template')


@section('contenu')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">   

            <div class="panel-heading">Fiche d'utilisateur</div>

            <div class="panel-body"> 

                <h4>Informations personnelles </h4>

                <p>Pseudo : {{ $utilisateurPatient->pseudo }}</p>

                <p>Nom : {{ $utilisateurPatient->nom }}</p>

                <p>Prénom : {{ $utilisateurPatient->prenom }}</p>

                @if($utilisateurPatient->sexe == 'H')
                    <p>Sexe : Homme</p>
                @else
                    <p>Sexe : Femme</p>
                @endif

                <p>Date de naissance : {{ $utilisateurPatient->date_naissance }}</p>

                <p>Email : {{ $utilisateurPatient->email }}</p>

                @if($utilisateurPatient->taux_de_graisse != 0)
                    <p>Taux de graisse : {{ $utilisateurPatient->taux_de_graisse }}</p>
                @endif

                @if($utilisateurPatient->taux_de_muscle != 0)
                    <p>Taux de muscle : {{ $utilisateurPatient->taux_de_muscle }}</p>
                @endif

                @if($utilisateurPatient->masse_osseuse != 0)
                    <p>Masse osseuse : {{ $utilisateurPatient->masse_osseuse }}</p>
                @endif

                @if($utilisateurPatient->heures_travaillées != 0)
                    <p>Nombres d'heures travaillées : {{ $utilisateurPatient->heures_travaillées }}</p>
                @endif

                <p>Nombre d'enfants : {{ $utilisateurPatient->nbr_enfants }}</p>

                @if($utilisateurPatient->situation_familiale != null)
                    <p>Situation familiale : {{ $utilisateurPatient->situation_familiale }}</p>
                @endif

                <p>Profession : 
                    @if($profession != null)
                        {{ $profession->libelle_profession }}
                    @else
                        Inconnue
                    @endif
                </p>

                <p>Ville : 
                    @if($ville != null)
                        {{ $ville->nom_ville }}
                    @else
                        Inconnue
                    @endif
                </p>

                <h4> Activités sportives </h4>

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

    </div>

@stop