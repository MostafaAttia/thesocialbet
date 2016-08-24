/**
 * Created by mostafa on 23/08/16.
 */


var app = angular.module('thesocialbetApp', []);

app.controller('thesocialbetCtrl', function($scope) {

    $scope.first_number= 2;
    $scope.prev_first_number = $scope.first_number - 1;
    $scope.post_first_number = $scope.first_number + 1;

    $scope.second_number= 2;
    $scope.prev_second_number = $scope.second_number - 1;
    $scope.post_second_number = $scope.second_number + 1;

    $scope.hideSides = false;

    $scope.plusBtnClick_firstNumber = function(){
        if($scope.first_number >= 0 && $scope.first_number < 10 ){
            $scope.first_number++;
        } else {
            $scope.first_number = 0;
        }

        $scope.hideSides = true;
    };

    $scope.minusBtnClick_firstNumber = function(){
        if($scope.first_number > 0 && $scope.first_number <= 10 ){
            $scope.first_number--;
        } else {
            $scope.first_number = 10;
        }

        $scope.hideSides = true;
    };

    $scope.plusBtnClick_secondNumber = function(){
        if($scope.second_number >= 0 && $scope.second_number < 10 ){
            $scope.second_number++;
        } else {
            $scope.second_number = 0;
        }

        $scope.hideSides = true;
    };

    $scope.minusBtnClick_secondNumber = function(){
        if($scope.second_number > 0 && $scope.second_number <= 10 ){
            $scope.second_number--;
        } else {
            $scope.second_number = 10;
        }

        $scope.hideSides = true;
    };


    $scope.changeFirstNumber = function(){
        if($scope.first_number == 0){
            $scope.prev_first_number = 0;
        } else {
            $scope.prev_first_number = $scope.first_number - 1;
        }

        if($scope.first_number == 10){
            $scope.post_first_number = 0;
        } else {
            $scope.post_first_number = $scope.first_number + 1;
        }
    };

    $scope.changeSecondNumber = function(){
        if($scope.second_number == 0){
            $scope.prev_second_number = 0;
        } else {
            $scope.prev_second_number = $scope.second_number - 1;
        }

        if($scope.second_number == 10){
            $scope.post_second_number = 0;
        } else {
            $scope.post_second_number = $scope.second_number + 1;
        }
    };






});