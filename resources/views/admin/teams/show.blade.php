@extends('layouts.admin')


@section('content')

    <div class="row">
        <div class="col-sm-3">
            @if($photo = $team->photo)
                <div class="text-center">
                    <img src="{{ $photo->path }}" alt="{{ $team->name }} photo" class="img-responsive img-rounded"/>
                </div>
            @endif
        </div>
        <div class="col-sm-9">
            <h3> {{ $team->name }}</h3>
            <p class="alert alert-info"> May Contain other team info in the future :) </p>
        </div>
    </div>

@stop