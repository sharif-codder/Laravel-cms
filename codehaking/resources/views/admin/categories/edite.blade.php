@extends('layouts.admin')

@section('content')

  <h1>Categories</h1>

  <div class="col-md-6">
  	{!! Form::model($categories,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$categories->id],'files'=>true]) !!}

     {{csrf_field()}}
        <div class="form-group col-md-12">

	      {!!Form::label('name','Ctegory Name:')!!}
	   	  {!!Form::text('name',null,['class'=>'form-control'])!!}

   	    </div>

   	    <div class="form-group col-md-6">
   	
   	       {!!Form::submit('Update Category',['class'=>'btn btn-primary col-md-12'])!!}
   
        </div>

    {!! Form::close() !!}

    {!! Form::model($categories,['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$categories->id],'files'=>true]) !!}

        <div class="form-group col-md-6">
    
          {!!Form::submit('Delete categories',['class'=>'btn btn-danger col-md-12'])!!}

        </div>

    {!! Form::close() !!}
  </div>

@stop