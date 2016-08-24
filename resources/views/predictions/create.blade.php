@extends('layouts.app')

@section('content')

    <div class="container" ng-app="thesocialbetApp" ng-controller="thesocialbetCtrl">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">


                {!! Form::open(['action' => 'PredictionsController@store', 'method' => 'POST', 'class'=> 'form-horizontal']) !!}

                <div class="panel panel-default">
                    <div class="panel-body">

                            <div class="row">
                                <div class="col-xs-5 text-center">
                                    <h6> {{ $match->findTeam($match->first_team_id)->name }} </h6>
                                </div>
                                <div class="col-xs-2">

                                </div>
                                <div class="col-xs-5 text-center">
                                    <h6> {{ $match->findTeam($match->second_team_id)->name }} </h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="row" id="first-swipe-div">
                                        <div class="col-xs-2">
                                            <h4 ng-hide="hideSides" class="text-muted numbers-padding-top input-sides" id="post_first_number">@{{ post_first_number }}</h4>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="number" name="first_team_result" ng-model="first_number " ng-change="changeFirstNumber()" ng-focus="hideSides=false" min="0" max="10" class="input-no-spinner text-center input-number" id="first_team_result"/>
                                            <div class="btn-group btn-group-justified">
                                                <a ng-click="minusBtnClick_firstNumber()"  class="btn btn-primary minus"> - </a>
                                                <a ng-click="plusBtnClick_firstNumber()" class="btn btn-primary add"> + </a>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <h4 ng-hide="hideSides" class="text-muted numbers-padding-top input-sides" id="prev_first_number">@{{ prev_first_number }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-2">

                                </div>

                                <div class="col-xs-5">
                                    <div class="row" id="second-swipe-div">
                                        <div class="col-xs-2">
                                            <h4 ng-hide="hideSides" class="text-muted numbers-padding-top input-sides" id="post_second_number">@{{ post_second_number }}</h4>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="number" name="second_team_result" ng-model="second_number" ng-change="changeSecondNumber()" ng-focus="hideSides=false" min="0" max="10" class="input-no-spinner text-center input-number" id="second_team_result"/>
                                            <div class="btn-group btn-group-justified" >
                                                <a ng-click="minusBtnClick_secondNumber()" class="btn btn-primary minus"> - </a>
                                                <a ng-click="plusBtnClick_secondNumber()" class="btn btn-primary add"> + </a>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <h4 ng-hide="hideSides" class="text-muted numbers-padding-top input-sides" id="prev_second_number">@{{ prev_second_number }}</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>

                    </div>
                </div>

                {!! Form::hidden('match_id', $match->id, ['id' => 'match_id']) !!}

                <div class="row">
                    <div class="col-xs-offset-3 col-xs-6 text-center">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}


            </div>
        </div>
    </div>

@endsection