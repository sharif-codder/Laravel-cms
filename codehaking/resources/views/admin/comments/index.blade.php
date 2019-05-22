@extends('layouts.admin')


@section('content')


@if(count($comments)>0)
   
   <h1>Comments</h1>

   <table class="table table-striped">

   	  <thead>
   	  	<tr>
   	  		<th>Id</th>
   	  		<th>User Name</th>
   	  		<th>Email</th>
          <th>Comments</th>
          <th>Post</th>
   	  		<th>Replies</th>
   	  	</tr>
   	  </thead>
   	  <tbody>
   	  	   @if($comments)

   	  	      @foreach($comments as $comment)

   	  	          <tr>
   	  	          	<td>{{$comment->id}}</td>
   	  	          	<td>{{$comment->author}}</td>
   	  	          	<td>{{$comment->email}}</td>
   	  	          	<td>{{$comment->body}}</td>
   	  	          	<td><a href="{{route('home.post',$comment->post->slug)}}">View Post</a></td>
                    <td><a href="{{route('admin.comment.reply.show',$comment->id)}}">view replies</a></td>
                    <td>
                    	@if($comment->is_active == 1)

	                    	{!! Form::model($comment,['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id]]) !!}

		                       <input type="hidden" name="is_active" value="0">
		                       
		                       
		                       <div class="form-group">
		                       	   {!! Form::submit('Un-approve',['class'=>'btn btn-success']) !!}
		                       </div>
	                        {!! Form::close() !!}

                           @else

                           {!! Form::model($comment,['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id]]) !!}

		                       <input type="hidden" name="is_active" value="1">
		                       
		                       
		                        <div class="form-group">
		                       	   {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
		                       	</div>
	                       	{!! Form::close() !!}

                        @endif

                    </td>
                    <td>
                    	{!! Form::model($comment,['method'=>'DELETE','action'=>['PostCommentController@destroy',$comment->id]]) !!}
	                       
	                       <div class="form-group">
	                       	   {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
	                       </div>
	                    {!! Form::close() !!}
                    </td>
   	  	          </tr>

   	  	      @endforeach

   	  	   @endif
   	  </tbody>
   	
   </table>
   
   @else

   <h1 class="text-center">No Comments</h1>

@endif


@stop