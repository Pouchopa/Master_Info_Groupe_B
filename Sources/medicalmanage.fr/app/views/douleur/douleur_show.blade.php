@extends('app')


@section('content')

    <div class="col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">

        <div class="panel panel-primary row">

            <div class="panel-heading">

                <h3 class="panel-title">Liste de vos douleurs</h3>

            </div>

            <table class="table col-sm-12" style="word-wrap: break-word;table-layout: fixed;">

                <thead>

                    <tr>

                        <th>Date</th>

                        <th>Position</th>

                        <th>Intensité</th>

                        <th>Évolution</th>

                        <th>Description</th>

                        <th>Modifier</th>

                    </tr>

                </thead>

                <tbody>
                    @if(count($patientDouleurs) !== 0)

                        @foreach ($patientDouleurs as $douleur)

                            <tr>
                                <td>{{ $douleur->date }}</td>

                                <td>{{ $douleur->position }}</td>

                                <td>{{ $douleur->intensite }}</td>

                                <td>{{ $douleur->evolution }}</td>

                                <td>{{ $douleur->description }} </td>

                                <td>
                                    <a href="{{url('douleur/edit/' . $douleur->id)}}" style="white-space: normal" class="btn btn-warning hidden-xs">
                                        <span class="glyphicon glyphicon-pencil"></<span> Modifier
                                    </a>
                                </td>

                            </tr>

                        @endforeach
                    @else 
                        <tr>
                            <td colspan="6">Aucune douleur enregistrée</td>
                        </tr>
                    @endif

                </tbody>

            </table>

        </div>

        <a href="{{ url('/douleur/create') }}" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus"></<span> Ajouter une douleur
        </a>

    </div>

@stop