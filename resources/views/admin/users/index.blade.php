@extends('layouts.admin')


@section('content')


   <h2>Users</h2>

   @if(session('user_deleted') || session('user_created'))

       <div class="alert alert-{{ session('user_deleted') ? 'warning' : 'success' }} alert-dismissible alert-popup" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           {{ session('user_deleted') ? session('user_deleted') : session('user_created') }}
       </div>

   @endif


   <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
       <thead>
           <tr>
               <th>ID</th>
               <th>Photo</th>
               <th>Name</th>
               <th>Email</th>
               <th>Role</th>
               <th>Edit</th>
               <th>Delete</th>
               <th>Status</th>
               <th>Created</th>
               <th>Updated</th>
           </tr>
       </thead>
       <tbody>
       @if($users)
           @foreach($users as $user)
           <tr>
               <td>{{ $user->id }}</td>
               @if($photo = $user->photo)
                   <td>
                       <img height="50px" width="50px" src="{{ $photo->path }}" alt="{{ $user->name }} photo" class="img-rounded"/>
                   </td>
               @else <td>no photo</td>
               @endif
               <td>
                   <a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a>
               </td>
               <td>{{ $user->email }}</td>
               @if($user->role)<td>{{ $user->role->name }}</td> @else <td>user</td>@endif
               <td class="text-center">
                   <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-xs btn-primary">
                       <i class="fa fa-pencil-square"></i> Edit
                   </a>
               </td>
               <td class="text-center">
                   {!! Form::open(['action' => ['AdminUsersController@destroy', $user->id], 'method' => 'DELETE']) !!}
                        {!! Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-xs btn-danger', 'type'=>'submit']) !!}
                   {!! Form::close() !!}
               </td>
               <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
               <td>{{ $user->created_at->diffForHumans() }}</td>
               <td>{{ $user->updated_at->diffForHumans() }}</td>
           </tr>
           @endforeach
       @endif
       </tbody>
   </table>

@stop