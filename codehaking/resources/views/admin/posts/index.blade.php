@extends('layouts.admin')


@section('content')

   <h1>Post</h1>

   <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>User</th>
        <th>Category</th>
        <th>title</th>
        <th>body</th>
        <th>Post</th>
        <th>Commnet</th>
        <th>Creation date</th>
        <th>Modification date</th>
      </tr>
    </thead>
    <tbody>
    	@if($posts)
            @foreach($posts as $post)
		        <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="100" width="100" src="{{$post->photo?asset('public/images/'.$post->photo->file):'http://placehold.it/400x400'}}" alt=""></td>
        		        <td><a href="{{route('admin.post.edit',$post->id)}}">{{$post->user->name}}</a></td>
        		        <td>{{$post->category?$post->category->name:'uncategories'}}</td>
        		        <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body,20)}}</td>
        		        <td><a href="{{route('home.post',$post->slug)}}">view post</a></td>
                    <td><a href="{{route('admin.comment.show',$post->id)}}">view comment</a></td>
        		    <td>{{$post->created_at->diffForHumans()}}</td>
        		    <td>{{$post->updated_at->diffForHumans()}}</td>
		        </tr>
	        @endforeach
        @endif
    </tbody>
  </table>
    
  <div class="row">
      <div class="col-md-6 col-md-offset-5">
          {{$posts->render()}}
      </div>
  </div>

@stop