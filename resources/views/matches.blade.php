@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                    {{--<div class="panel-heading">Matches: </div>--}}

                    @foreach($matches as $match)
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <img src="{{ $match->findTeam($match->first_team_id)->photo->path }}" class="img-responsive"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <h6>{{ $match->findTeam($match->first_team_id)->name }}</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="row">
                                        <div class="col-xs-8 col-xs-offset-2">
                                            <img src="{{ \Illuminate\Support\Facades\URL::asset('images/placeholder.png') }}"  class="img-responsive"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <a href="{{ route('predict.create', $match->id) }}" class="btn btn-primary hidden-xs">Predict!</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <img src="{{ $match->findTeam($match->second_team_id)->photo->path }}" class="img-responsive"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <h6>{{ $match->findTeam($match->second_team_id)->name }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--visible only in extra-small screens--}}
                            <div class="row visible-xs">
                                <div class="col-sm-12">
                                    <a {{ route('predict.create', $match->id) }}  class="btn btn-primary btn-block">Predict!</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach

            </div>
        </div>
    </div>

@endsection