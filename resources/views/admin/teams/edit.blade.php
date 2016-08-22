@extends('layouts.admin')

@section('content')

    <h2>Edit Team: {{ $team->name }}</h2>

    {!! Form::open(['action' => ['AdminTeamsController@update', $team->id], 'method' => 'PATCH', 'class'=> 'form-horizontal', 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name: ', ['class' => 'col-sm-2 control-label', 'for'=>'name']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', $team->name, ['class' => 'form-control', 'placeholder'=> 'Full Name', 'id'=>'name']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Image: ', ['class' => 'col-sm-2 control-label', 'for'=>'image']) !!}
        <div class="col-sm-10">
            {!! Form::file('image', ['class' => 'form-control', 'id'=>'image']) !!}
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