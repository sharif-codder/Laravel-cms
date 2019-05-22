@extends('layouts.admin')


@section('content')

    
    @include('includes.tinyeditor');
   <h1>Create Post</h1>

    {!! Form::open(['method'=>'POST','action'=>'AdminPostController@store','files'=>true]) !!}

  {{csrf_field()}}
   
    <div class="form-group col-md-12">
   	
   	  {!!Form::label('tiltle','Title:')!!}
   	  {!!Form::text('title',null,['class'=>'form-control','id'=>'title'])!!}

    </div>

    <div class="form-group col-md-12">
   	
   	  {!!Form::label('category_id','Catogory:')!!}
   	  {!!Form::select('category_id',[''=>'choose categories']+$categories,null,['class'=>'form-control','id'=>'category'])!!}

    </div>

    <div class="form-group col-md-12">
   	
   	  {!!Form::label('photo_id','Photo:')!!}
      {!!Form::file('photo_id',null,['class'=>'form-control','id'=>'photo'])!!}

    </div>
  

    <div class="form-group col-md-12">
   	
   	  {!!Form::label('body','Discription:')!!}
   	  {!!Form::textarea('body',null,['class'=>'form-control'])!!}

    </div>

    <div class="form-group col-md-12">
   	
   	  {!!Form::submit('Create post',['class'=>'btn btn-primary'])!!}
   
    </div>

  {!! Form::close() !!}

  <div class="col-md-12">

    @include('includes.form_error')

  </div>

  
@stop

