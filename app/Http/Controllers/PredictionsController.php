<?php

namespace App\Http\Controllers;

use App\Match;
use App\Prediction;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PredictionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

//        $matches = Match::all();
//
//        $matchesJson =  response()->json(['data'=>$matches], 200);
//
//        return view('predict.show', compact('matchesJson', 'matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($match_id)
    {
        //

        $match = Match::find($match_id);

        return view('predictions/create', compact('match'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_team_result'     => 'required|integer|min:0|max:10',
            'second_team_result'     => 'required|integer|min:0|max:10'
        ]);

        $input = $request->all();

        $input['user_id'] = Auth::user()->id;

        Prediction::create($input);

        Session::flash('prediction_created', 'Good Luck!');

        return redirect('/matches');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
