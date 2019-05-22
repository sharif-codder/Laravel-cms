@extends('layouts.admin')

@section('content')

  <h1>Create User</h1>

  {!! Form::open(['method'=>'POST','action'=>'AdminUserController@store','files'=>true]) !!}

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
   	  {!!Form::select('role_id',[''=>'choose option']+$roles,null,['class'=>'form-control','id'=>'role_id'])!!}

   </div>

   <div class="form-group col-md-12">
   	
   	  {!!Form::label('is_active','Status:')!!}
   	  {!!Form::select('is_active',array(1=>'Active',0=>'Not Active'),0,['class'=>'form-control','id'=>'email'])!!}

   </div>

    <div class="form-group col-md-12">
   	
   	  {!!Form::label('password','Password:')!!}
   	  {!!Form::password('password',['class'=>'form-control','id'=>'email'])!!}

   </div>

   <div class="form-group col-md-12">
   	
   	  {!!Form::label('photo_id','Photo:')!!}
      {!!Form::file('photo_id',null,['class'=>'form-control','id'=>'photo'])!!}

   </div>

   <div class="form-group col-md-12">
   	
   	  {!!Form::submit('Create user',['class'=>'btn btn-primary'])!!}
   
    </div>

  {!! Form::close() !!}
  
  <div class="col-md-12">

    @include('includes.form_error')
  </div>

@stop