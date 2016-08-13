@extends('layouts.admin')


@section('content')

    <div class="row">
        <div class="col-sm-6">
            <span class="glyphicon glyphicon-user"></span><strong> Name:</strong> {{ $user->name }} <br>
            <span class="glyphicon glyphicon-envelope"></span><strong> Email:</strong> {{ $user->email }} <br>
            <span class="glyphicon glyphicon-file"></span><strong> Role:</strong> {{ $user->role != null ? $user->role->name : "No Role" }} <br>
            <span class="{{ $user->is_active == 1 ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove' }}  "></span><strong> Status:</strong> {{ $user->is_active == 1 ? 'Active' : 'Not Active' }} <br>
        </div>
        <div class="col-sm-6">
            @if($photo = $user->photo)
                <div class="text-center">
                    <img src="{{ $photo->path }}" alt="{{ $user->name }} photo" class="img-rounded user-img"/>
                </div>
            @endif
        </div>
    </div>


@stop