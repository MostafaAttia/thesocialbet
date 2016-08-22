@extends('layouts.admin')


@section('content')


    <h2>Teams: </h2>

    @if(session('team_deleted') || session('team_created'))

        <div class="alert alert-{{ session('team_deleted') ? 'warning' : 'success' }} alert-dismissible alert-popup" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ session('team_deleted') ? session('team_deleted') : session('team_created') }}
        </div>

    @endif


    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Logo</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($teams)
            @foreach($teams as $team)
                <tr>
                    <td>{{ $team->id }}</td>
                    @if($photo = $team->photo)
                        <td class="text-center">
                            <img height="50px" width="50px" src="{{ $photo->path }}" alt="{{ $team->name }} photo" class="img-rounded"/>
                        </td>
                    @else <td>no photo</td>
                    @endif
                    <td>
                        <a href="{{ route('admin.teams.show', $team->id) }}">{{ $team->name }}</a>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.teams.edit', $team->id) }}" class="btn btn-xs btn-primary">
                            <i class="fa fa-pencil-square"></i> Edit
                        </a>
                    </td>
                    <td class="text-center">
                        {!! Form::open(['action' => ['AdminTeamsController@destroy', $team->id], 'method' => 'DELETE']) !!}
                        {!! Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-xs btn-danger', 'type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>{{ $team->created_at->diffForHumans() }}</td>
                    <td>{{ $team->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop