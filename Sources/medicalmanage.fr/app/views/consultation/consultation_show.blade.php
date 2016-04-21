@extends('app')


@section('content')

    <div class="col-sm-12 col-md-offset-1 col-md-10">

        <div class="panel panel-primary">

            <div class="panel-heading">

                <h3 class="panel-title">Liste de vos consultations</h3>

            </div>

            <table class="table" style="word-wrap: break-word;table-layout: fixed;">

                <thead>

                    <tr>

                        <th>Date</th>

                        <th>Description</th>

                        <th>Maladie</th>

                        <th>Acte(s)</th>

                        <th>Commentaire Kiné</th>

                        <th>Commentaire Patient</th>

                        <th></th>

                    </tr>

                </thead>

                <tbody>
                    @if(count($patientConsultations) !== 0)

                        @foreach ($patientConsultations as $consultation)

                            <tr>
                                <td>{{ $consultation->date }}</td>

                                <td>{{ $consultation->description }}</td>

                                <td>{{ $consultation->maladie->libelle }}</td>

                                <td>
                                    @foreach($consultation->acte as $acte)
                                        {{ $acte[0]->libelle }} <br />
                                    @endforeach
                                </td>

                                <td>{{ $consultation->commentaireKine }}</td>

                                <td>{{ $consultation->commentairePatient }}</td>

                                <td>
                                    <a href="{{url('consultation/edit/' . $consultation->id)}}" style="white-space: normal" class="btn btn-primary hidden-xs">
                                        <span class="glyphicon glyphicon-pencil"></<span> Donnez votre avis
                                    </a>
                                </td>

                            </tr>

                        @endforeach
                    @else 
                        <tr>
                            <td colspan="7">Aucune consultation répertoriée</td>
                        </tr>
                    @endif

                </tbody>

            </table>

        </div>

    </div>

@stop