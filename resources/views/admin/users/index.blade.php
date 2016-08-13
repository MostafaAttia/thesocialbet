@extends('layouts.admin')


@section('content')


   <h2>Users</h2>
   <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
       <thead>
           <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Email</th>
               <th>Role</th>
               <th>Status</th>
               <th>Created at</th>
               <th>Updated at</th>
           </tr>
       </thead>
       <tbody>
       @if($users)
           @foreach($users as $user)
           <tr>
               <td>{{ $user->id }}</td>
               <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a></td>
               <td>{{ $user->email }}</td>
               @if($user->role)<td>{{ $user->role->name }}</td> @else <td>user</td>@endif
               <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
               <td>{{ $user->created_at->diffForHumans() }}</td>
               <td>{{ $user->updated_at->diffForHumans() }}</td>
           </tr>
           @endforeach
       @endif
       </tbody>
   </table>

@stop