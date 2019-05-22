@extends('layouts.admin')

@section('content')

<h1>user</h1>

<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Creation date</th>
        <th>Modification date</th>
      </tr>
    </thead>
    <tbody>
    	@if($users)
            @foreach($users as $user)
		      <tr>
                <td>{{$user->id}}</td>
		        <td><img height="100" width="100" src="{{$user->photo?asset('public/images/'.$user->photo->file):'http://placehold.it/400x400'}}" alt=""></td>
		        <td><a href="{{route('admin.user.edit',$user->id)}}">{{$user->name}}</a></td>
		        <td>{{$user->email}}</td>
		        <td>{{$user->role->name}}</td>
		        <td>{{$user->is_active == 1?'active':'Not Active'}}</td>
		        <td>{{$user->created_at->diffForHumans()}}</td>
		        <td>{{$user->updated_at->diffForHumans()}}</td>
		      </tr>
	        @endforeach
        @endif
    </tbody>
  </table>

@stop