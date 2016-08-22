@extends('layouts.admin')

@section('content')

    <h2>Create a new Match: </h2>

    {!! Form::open(['action' => 'AdminMatchesController@store', 'method' => 'POST', 'class'=> 'form-horizontal', 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('first_team', 'First Team: ', ['class' => 'col-sm-2 control-label', 'for'=>'first_team']) !!}
        <div class="col-sm-10">
            {!! Form::select('first_team_id', $teams , null , ['class' => 'form-control', 'id'=>'first_team', 'placeholder'=>'select second team']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('second_team', 'Second Team: ', ['class' => 'col-sm-2 control-label', 'for'=>'second_team']) !!}
        <div class="col-sm-10">
            {!! Form::select('second_team_id', $teams , null , ['class' => 'form-control', 'id'=>'second_team', 'placeholder'=>'select first team']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <label>
                {!! Form::checkbox('redirect', '1', null,  ['id' => 'redirect']) !!}
                Redirect to: Create Another Match
            </label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Create Team', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}

    @include('partials.errors')

@stop