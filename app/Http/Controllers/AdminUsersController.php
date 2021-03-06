<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::lists('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
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
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users,email',
            'password'  => 'required|min:6|confirmed',
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

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'role_id'   => $request->role_id,
            'is_active' => $request->is_active,
            'password'  => bcrypt($request->password),
            'photo_id'  => $input['photo_id'],
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);

        Session::flash('user_created', 'User ' . $request->name . ' Created Successfully!');

        return redirect('admin/users');
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

        $user = User::find($id);

        return view('admin/users/show', compact('user'));
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

        $user = User::find($id);
        $roles = Role::lists('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
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
        $user = User::find($id);

        $this->validate($request, [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255'. ($user->email==$request->email ? '' : '|unique:users,email'),
            'password'  => 'required|min:6|confirmed',
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

        $input['password'] = bcrypt($request->password);
        $user->update($input);
        return redirect('admin/users');

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

        $user = User::findOrFail($id);
        $name = $user->name;

        if($user->photo){
            unlink(public_path(). $user->photo->path);
            Photo::findOrFail($user->photo->id)->delete();
        }

        $user->delete();

        Session::flash('user_deleted', 'User '. $name .' has been Deleted Successfully!' );

        return redirect('admin/users');
    }
}
