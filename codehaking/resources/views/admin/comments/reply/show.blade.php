@extends('layouts.admin')


@section('content')


@if(count($replies)>0)
   
   <h1>replies</h1>

   <table class="table table-striped">

   	  <thead>
   	  	<tr>
   	  		<th>Id</th>
   	  		<th>User Name</th>
   	  		<th>Email</th>
          <th>Replies</th>
   	  		<th>Post</th>
   	  	</tr>
   	  </thead>
   	  <tbody>
   	  	   @if($replies)

   	  	      @foreach($replies as $reply)

   	  	          <tr>
   	  	          	<td>{{$reply->id}}</td>
   	  	          	<td>{{$reply->author}}</td>
   	  	          	<td>{{$reply->email}}</td>
   	  	          	<td>{{$reply->body}}</td>
   	  	          	<td><a href="{{route('home.post',$reply->comment->post->slug)}}">View Post</a></td>
                    <td>
                    	@if($reply->is_active == 1)

	                    	{!! Form::model($reply,['method'=>'PATCH','action'=>['CommentReplyController@update',$reply->id]]) !!}

		                       <input type="hidden" name="is_active" value="0">
		                       
		                       
		                       <div class="form-group">
		                       	   {!! Form::submit('Un-approve',['class'=>'btn btn-success']) !!}
		                       </div>
	                        {!! Form::close() !!}

                           @else

                           {!! Form::model($reply,['method'=>'PATCH','action'=>['CommentReplyController@update',$reply->id]]) !!}

		                       <input type="hidden" name="is_active" value="1">
		                       
		                       
		                        <div class="form-group">
		                       	   {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
		                       	</div>
	                       	{!! Form::close() !!}

                        @endif

                    </td>
                    <td>
                    	{!! Form::model($reply,['method'=>'DELETE','action'=>['CommentReplyController@destroy',$reply->id]]) !!}
	                       
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

   <h1 class="text-center">No replies</h1>

@endif


@stop