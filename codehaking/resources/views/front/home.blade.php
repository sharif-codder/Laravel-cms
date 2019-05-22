@extends('layouts.blog-home')

@section('content')
<!-- First Blog Post -->
  
  @if($posts)

    @foreach($posts as $post)

        <h2>
            <a href="#">{{$post->title}}</a>
        </h2>
        <p class="lead">
            by {{$post->user->name}}
        </p>
        <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>
        <hr>
        <img class="img-responsive" src="{{$post->photo?asset('public/images/'.$post->photo->file):'http://placehold.it/900x300'}}" alt="">
        <hr>
        <p>{!!str_limit($post->body,400)!!}</p>
        <a class="btn btn-primary" href="{{url('/post/'.$post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>

    @endforeach
  @endif
  
  <div class="col-md-6 col-md-offset-5">
      {{$posts->render()}}
  </div>

@endsection
