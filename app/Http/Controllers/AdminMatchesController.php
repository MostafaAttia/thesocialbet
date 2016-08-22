<?php

namespace App\Http\Controllers;

use App\Match;
use App\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $matches = Match::all();

        return view('admin.matches.index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $teams = Team::lists('name', 'id');
        return view('admin.matches.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'first_team_id'      => 'required|integer',
            'second_team_id'      => 'required|integer'
        ]);

        Match::create([
            'first_team_id'      => $request->first_team_id,
            'second_team_id'      => $request->second_team_id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);

        Session::flash('match_created', 'Match Created Successfully!');

        if($request->redirect){
            return redirect('admin/matches/create');
        } else {
            return redirect('admin/matches');
        }
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

        $match = Match::findOrFail($id);
        $teams = Team::lists('name', 'id');
        return view('admin.matches.edit', compact('match', 'teams'));
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

        $match= Match::findOrFail($id);

        $this->validate($request, [
            'first_team_id'      => 'required|integer',
            'second_team_id'      => 'required|integer'
        ]);

        $match->update($request->all());

        return redirect('admin/matches');
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
        $match = Match::findOrFail($id);

        $match->delete();

        Session::flash('match_deleted', 'Match has been Deleted Successfully!' );

        return redirect('admin/matches');
    }
}
