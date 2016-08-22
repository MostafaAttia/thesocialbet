<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminTeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $teams = Team::all();

        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.teams.create');
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
            'name'      => 'required|max:255',
            'image'     => 'required|image'
        ]);

        $input = $request->all();

        // extract image
        if($file = $request->file('image')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        Team::create([
            'name'      => $request->name,
            'photo_id'  => $input['photo_id'],
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);

        Session::flash('team_created', 'Team ' . $request->name . ' Created Successfully!');

        if($request->redirect){
            return redirect('admin/teams/create');
        } else {
            return redirect('admin/teams');
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
        $team = Team::findOrFail($id);
        return view('admin.teams.show', compact('team'));
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
        $team = Team::find($id);

        return view('admin.teams.edit', compact('team'));
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

        $team = Team::find($id);

        $this->validate($request, [
            'name'      => 'required|max:255',
            'image'     =>'required|image'
        ]);

        $input = $request->all();

        // extract image
        if($file = $request->file('image')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $team->update($input);
        return redirect('admin/teams');
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

        $team = Team::findOrFail($id);
        $name = $team->name;

        if($team->photo){
            unlink(public_path(). $team->photo->path);
            Photo::findOrFail($team->photo->id)->delete();
        }

        $team->delete();

        Session::flash('team_deleted', 'Team '. $name .' has been Deleted Successfully!' );

        return redirect('admin/teams');
    }
}
