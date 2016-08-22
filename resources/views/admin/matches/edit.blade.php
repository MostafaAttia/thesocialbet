@extends('layouts.admin')

@section('content')

    <h2>Edit Match: </h2>

    {!! Form::open(['action' => ['AdminMatchesController@update', $match->id], 'method' => 'PATCH', 'class'=> 'form-horizontal', 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('first_team', 'First Team: ', ['class' => 'col-sm-2 control-label', 'for'=>'first_team']) !!}
        <div class="col-sm-10">
            {!! Form::select('first_team_id', $teams , $match->first_team_id , ['class' => 'form-control', 'id'=>'first_team', 'placeholder'=>'select first team']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('second_team', 'Second Team: ', ['class' => 'col-sm-2 control-label', 'for'=>'second_team']) !!}
        <div class="col-sm-10">
            {!! Form::select('second_team_id', $teams , $match->second_team_id , ['class' => 'form-control', 'id'=>'second_team', 'placeholder'=>'select second team']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}

    @include('partials.errors')

@stop