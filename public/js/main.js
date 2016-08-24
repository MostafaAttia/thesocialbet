/**
 * Created by mostafa on 24/08/16.
 */


$(document).ready(function() {

    $("#first-swipe-div").on("swiperight",function(){
        var inputValue = parseInt($('#first_team_result').val());
        if(inputValue >= 0 && inputValue <10){
            $('#first_team_result').val(inputValue+1);
            $('#prev_first_number').text(parseInt($('#first_team_result').val())-1);
            $('#post_first_number').text(parseInt($('#first_team_result').val())+1);
        } else {
            $('#first_team_result').val(0);
        }

    }).on("swipeleft",function(){
        var inputValue = parseInt($('#first_team_result').val());
        if(inputValue > 0 && inputValue <=10){
            $('#first_team_result').val(inputValue-1);
            $('#prev_first_number').text(parseInt($('#first_team_result').val())-1);
            $('#post_first_number').text(parseInt($('#first_team_result').val())+1);
        } else {
            $('#first_team_result').val(10);
        }

    });

    $("#second-swipe-div").on("swiperight",function(){
        var inputValue = parseInt($('#second_team_result').val());
        if(inputValue >= 0 && inputValue <10){
            $('#second_team_result').val(inputValue+1);
            $('#prev_second_number').text(parseInt($('#second_team_result').val())-1);
            $('#post_second_number').text(parseInt($('#second_team_result').val())+1);
        } else {
            $('#first_team_result').val(0);
        }

    }).on("swipeleft",function(){
        var inputValue = parseInt($('#second_team_result').val());
        if(inputValue > 0 && inputValue <=10){
            $('#second_team_result').val(inputValue-1);
            $('#prev_second_number').text(parseInt($('#second_team_result').val())-1);
            $('#post_second_number').text(parseInt($('#second_team_result').val())+1);
        } else {
            $('#second_team_result').val(10);
        }

    });







} );
//# sourceMappingURL=main.js.map
