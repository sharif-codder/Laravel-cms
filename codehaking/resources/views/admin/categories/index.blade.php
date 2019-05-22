@extends('layouts.admin')

@section('content')

  <h1>Categories</h1>

  <div class="col-md-6">
  	 {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store','files'=>true]) !!}

     {{csrf_field()}}
        <div class="form-group col-md-12">

	      {!!Form::label('name','Ctegory Name:')!!}
	   	  {!!Form::text('name',null,['class'=>'form-control'])!!}

   	    </div>

   	    <div class="form-group col-md-12">
   	
   	       {!!Form::submit('Create Category',['class'=>'btn btn-primary'])!!}
   
        </div>

    {!! Form::close() !!}
    <div class="col-md-12">

    @include('includes.form_error')

   </div>
  </div>
  <div class="col-md-6">
  	<table class="table table-striped">
  		<tr>
	  		<th>Id</th>
	  		<th>Name</th>
	  		<th>Cration date</th>
	  		<th>Update date</th>
  		</tr>

  		@if($categories)

  		    @foreach($categories as $category)

  		       <tr>
  		       	  <td>{{$category->id}}</td>
  		       	  <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
  		       	  <td>{{$category->created_at?$category->created_at->diffForHumans():'No data'}}</td>
  		       	  <td>{{$category->updated_at?$category->updated_at->diffForHumans():'No data'}}</td>
  		       </tr>

  		    @endforeach

  		@endif

  	</table>
  </div>

@stop