@extends('layouts.admin')


@section('content')

  @include('includes.tinyeditor');

   <h1>Edit Post</h1>

<div class="col-md-3">
	<img height="100" width="100" src="{{$post->photo?asset('public/images/'.$post->photo->file):'http://placehold.it/400x400'}}" alt="">
</div>
<div class="col-md-9">

   {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostController@update',$post->id],'files'=>true]) !!}

    {{csrf_field()}}
   
    <div class="form-group col-md-12">
   	
   	  {!!Form::label('tiltle','Title:')!!}
   	  {!!Form::text('title',null,['class'=>'form-control','id'=>'title'])!!}

    </div>

    <div class="form-group col-md-12">
   	
   	  {!!Form::label('category_id','Catogory:')!!}
   	  {!!Form::select('category_id',$categories,null,['class'=>'form-control','id'=>'category'])!!}

    </div>

    <div class="form-group col-md-12">
   	
   	  {!!Form::label('photo_id','Photo:')!!}
      {!!Form::file('photo_id',null,['class'=>'form-control','id'=>'photo'])!!}

    </div>
  

    <div class="form-group col-md-12">
   	
   	  {!!Form::label('body','Discription:')!!}
   	  {!!Form::textarea('body',null,['class'=>'form-control'])!!}

    </div>

    <div class="form-group col-md-6">
   	
   	  {!!Form::submit('Update post',['class'=>'btn btn-primary col-md-12'])!!}
   
    </div>

  {!! Form::close() !!}

  {!! Form::model($post,['method'=>'DELETE','action'=>['AdminPostController@destroy',$post->id],'files'=>true]) !!}

        <div class="form-group col-md-6">
    
          {!!Form::submit('Delete post',['class'=>'btn btn-danger col-md-12'])!!}

        </div>

    {!! Form::close() !!}

   <div class="col-md-12">

    @include('includes.form_error')

   </div>

</div>
@stop