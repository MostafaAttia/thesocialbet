@extends('layouts.admin')


@section('content')

    <h3>All Predictions: </h3>

    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Match ID</th>
            <th>By: </th>
            <th class="text-center">Result</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($predictions)
            @foreach($predictions as $prediction)
                <tr>
                    <td>{{ $prediction->id }}</td>
                    <td>{{ $prediction->match->id }}</td>
                    <td>{{ $prediction->user->name }}</td>

                    <td  class="row text-center">
                        <div class="col-sm-3">
                            <img src="{{ $prediction->match->findTeam($prediction->match->first_team_id)->photo->path }}"  class="img-rounded table-photo"/>
                        </div>
                        <div class="col-sm-1 team-result">
                            {{ $prediction->first_team_result }}
                        </div>

                        <div class="col-sm-3">
                            <img src="{{ \Illuminate\Support\Facades\URL::asset('images/placeholder.png') }}"  class="img-rounded placeholder-image"/>
                        </div>
                        <div class="col-sm-1 team-result">
                            {{ $prediction->second_team_result }}
                        </div>
                        <div class="col-sm-3">
                            <img src="{{ $prediction->match->findTeam($prediction->match->second_team_id)->photo->path }}"  class="img-rounded table-photo"/>
                        </div>
                    </td>

                    <td>{{ $prediction->created_at->diffForHumans() }}</td>
                    <td>{{ $prediction->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop