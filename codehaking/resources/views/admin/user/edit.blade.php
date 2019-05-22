@extends('layouts.admin')

@section('content')

  <h1>Edit User</h1>


  <div class="col-md-3">
      <img src="{{$user->photo?asset('public/images/'.$user->photo->file):'http://placehold.it/250x250'}}">
  </div>

  <div class="col-md-9">

    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUserController@update',$user->id],'files'=>true]) !!}
  
     {{csrf_field()}}
   
     <div class="form-group col-md-12">
      
        {!!Form::label('name','name:')!!}
        {!!Form::text('name',null,['class'=>'form-control','id'=>'name'])!!}

     </div>

     <div class="form-group col-md-12">
      
        {!!Form::label('email','Email:')!!}
        {!!Form::email('email',null,['class'=>'form-control','id'=>'email'])!!}

     </div>

     <div class="form-group col-md-12">
      
        {!!Form::label('role_id','Role:')!!}
        {!!Form::select('role_id',$roles,null,['class'=>'form-control','id'=>'role_id'])!!}

     </div>

     <div class="form-group col-md-12">
      
        {!!Form::label('is_active','Status:')!!}
        {!!Form::select('is_active',array(1=>'Active',0=>'Not Active'),null,['class'=>'form-control','id'=>'email'])!!}

     </div>

      <div class="form-group col-md-12">
      
        {!!Form::label('password','Password:')!!}
        {!!Form::password('password',['class'=>'form-control','id'=>'email'])!!}

     </div>

     <div class="form-group col-md-12">
      
        {!!Form::label('photo_id','Photo:')!!}
        {!!Form::file('photo_id',null,['class'=>'form-control','id'=>'photo'])!!}

     </div>

     <div class="form-group col-md-6">
      
        {!!Form::submit('Update user',['class'=>'btn btn-primary col-md-12'])!!}
     
     </div>

    {!! Form::close() !!}

    {!! Form::model($user,['method'=>'DELETE','action'=>['AdminUserController@destroy',$user->id],'files'=>true]) !!}

        <div class="form-group col-md-6">
    
          {!!Form::submit('Delete user',['class'=>'btn btn-danger col-md-12'])!!}

        </div>

    {!! Form::close() !!}
    
  </div>
  <div class="col-md-12">
      
    @include('includes.form_error')

  </div>

@stop