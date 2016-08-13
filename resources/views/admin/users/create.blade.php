@extends('layouts.admin')

@section('content')

    <h2>Create a new user: </h2>

    {!! Form::open(['action' => 'AdminUsersController@store', 'method' => 'post', 'class'=> 'form-horizontal', 'files' => true]) !!}

        <div class="form-group">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-2 control-label', 'for'=>'name']) !!}
            <div class="col-sm-10">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=> 'Full Name', 'id'=>'name']) !!}
            </div>
        </div>

        <div class="form-group">
                {!! Form::label('email', 'Email: ', ['class' => 'col-sm-2 control-label', 'for'=>'email']) !!}
            <div class="col-sm-10">
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder'=> 'Email', 'id'=>'email']) !!}
            </div>
        </div>

        <div class="form-group">
                {!! Form::label('role', 'Role: ', ['class' => 'col-sm-2 control-label', 'for'=>'role']) !!}
            <div class="col-sm-10">
                {!! Form::select('role_id', $roles , '3' , ['class' => 'form-control', 'id'=>'role']) !!}
            </div>
        </div>

        <div class="form-group">
                {!! Form::label('password', 'Password: ', ['class' => 'col-sm-2 control-label', 'for'=>'password']) !!}
            <div class="col-sm-10">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder'=> 'Password', 'id'=>'password']) !!}
            </div>
        </div>

        <div class="form-group">
                {!! Form::label('confirm', 'Confirm Password: ', ['class' => 'col-sm-2 control-label', 'for'=>'confirm']) !!}
            <div class="col-sm-10">
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder'=> 'Password again', 'id'=>'confirm']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('status', 'Status: ', ['class' => 'col-sm-2 control-label', 'for'=>'status']) !!}
            <div class="col-sm-10">
                {!! Form::select('is_active', ['1'=>'Active', '0'=>'Not Active'] , '0' , ['class' => 'form-control', 'id'=>'status']) !!}
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
                {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>


    {!! Form::close() !!}

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif





@stop