@extends('layouts.admin')

@section('content')

    <h2>Create a new Team: </h2>

    {!! Form::open(['action' => 'AdminTeamsController@store', 'method' => 'POST', 'class'=> 'form-horizontal', 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name: ', ['class' => 'col-sm-2 control-label', 'for'=>'name']) !!}
            <div class="col-sm-10">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=> 'Full Name', 'id'=>'name']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('image', 'Image: ', ['class' => 'col-sm-2 control-label', 'for'=>'image']) !!}
            <div class="col-sm-10">
                {!! Form::file('image', ['class' => 'form-control', 'id'=>'image']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <label>
                	{!! Form::checkbox('redirect', '1', null,  ['id' => 'redirect']) !!}
                	Redirect to: Create Another Team
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