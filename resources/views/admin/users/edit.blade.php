@extends('layouts.admin')


@section('content')

    <h2><strong>Edit user:</strong> {{ $user->name }} </h2>

    <div class="row">

        <div class="col-sm-3">
            <div>
                <img src="{{ $user->photo ? $user->photo->path : 'http://placehold.it/350x400?text='. $user->name }}" alt="{{ $user->name }} photo" class="img-responsive img-rounded"/>
            </div>
        </div>

        <div class="col-sm-9">
            {!! Form::open(['action' => ['AdminUsersController@update', $user->id], 'method' => 'PATCH', 'class'=> 'form-horizontal', 'files' => true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-2 control-label', 'for'=>'name']) !!}
                <div class="col-sm-10">
                    {!! Form::text('name', $user->name, ['class' => 'form-control', 'id'=>'name']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email: ', ['class' => 'col-sm-2 control-label', 'for'=>'email']) !!}
                <div class="col-sm-10">
                    {!! Form::email('email', $user->email, ['class' => 'form-control','id'=>'email']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('role', 'Role:', ['class' => 'col-sm-2 control-label', 'for'=>'role']) !!}
                <div class="col-sm-10">
                    {!! Form::select('role_id', $roles ,  $user->role ? $user->role->id : 3 , ['class' => 'form-control', 'id'=>'role']) !!}
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
                    {!! Form::select('is_active', ['1'=>'Active', '0'=>'Not Active'] , $user->is_active , ['class' => 'form-control', 'id'=>'status']) !!}
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
        </div>

    </div>

    @include('partials.errors')


@stop