@extends('app')


@section('content')

    <div class="col-sm-offset-3 col-sm-6">

        <div class="panel panel-primary">

            <div class="panel-heading">

                <h3 class="panel-title">Liste de vos consultations</h3>

            </div>

            <table class="table">

                <thead>

                    <tr>

                        <th>Date</th>

                        <th>Description</th>

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

                                <td>{{ $consultation->commentaireKine }}</td>

                                <td>{{ $consultation->commentairePatient }}</td>

                                <td>
                                    <a href="{{url('consultation/edit/' . $consultation->id)}}" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-pencil"></<span> Donnez votre avis
                                    </a>
                                </td>

                            </tr>

                        @endforeach
                    @else 
                        <tr>
                            <td colspan="4">Aucune consultation répertoriée</td>
                        </tr>
                    @endif

                </tbody>

            </table>

        </div>

    </div>

@stop