@extends('layouts.admin')


@section('content')


    <h2>Matches: </h2>

    @if(session('match_deleted') || session('match_created'))

        <div class="alert alert-{{ session('match_deleted') ? 'warning' : 'success' }} alert-dismissible alert-popup" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ session('match_deleted') ? session('match_deleted') : session('match_created') }}
        </div>

    @endif


    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>first Team</th>
            <th>Second Team</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($matches)
            @foreach($matches as $match)
                <tr>
                    <td>{{ $match->id }}</td>
                    <td>
                        <img height="50px" width="50px" src="{{ $match->findTeam($match->first_team_id)->photo->path }}" class="img-rounded"/>
                        <a href="{{ route('admin.teams.show', $match->findTeam($match->first_team_id)->id) }}">{{ $match->findTeam($match->first_team_id)->name }}</a>
                    </td>
                    <td>
                        <img height="50px" width="50px" src="{{ $match->findTeam($match->second_team_id)->photo->path }}" class="img-rounded"/>
                        <a href="{{ route('admin.teams.show', $match->findTeam($match->second_team_id)->id) }}">{{ $match->findTeam($match->second_team_id)->name }}</a>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.matches.edit', $match->id) }}" class="btn btn-xs btn-primary">
                            <i class="fa fa-pencil-square"></i> Edit
                        </a>
                    </td>
                    <td class="text-center">
                        {!! Form::open(['action' => ['AdminMatchesController@destroy', $match->id], 'method' => 'DELETE']) !!}
                            {!! Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-xs btn-danger', 'type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>{{ $match->created_at->diffForHumans() }}</td>
                    <td>{{ $match->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop