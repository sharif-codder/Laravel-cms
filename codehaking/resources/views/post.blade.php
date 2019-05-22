@extends('layouts.blog-home')



@section('content')


                <!-- Blog Post -->
                @include('includes.flash_message')

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by {{$post->user->name}}
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo?asset('public/images/'.$post->photo->file):$post->photoPlaceholder()}}" alt="">

                <hr>

                <!-- Post Content -->
                <p>{!!$post->body!!}</p>

                <hr>

                <!-- Blog Comments -->


                <!-- Comments Form -->
            @if(Auth::check())

                <div class="well">
                    <h4>Leave a Comment:</h4>
                    {!!Form::open(['method'=>'POST','route'=>['user.comment'], 'autocomplete' =>'off', 'enctype' => 'multipart/form-data']) !!}

                       <input type="hidden" name="post_id" value="{{$post->id}}">
                       
                       <div class="form-group">

                           {!! Form::label('body','Comment') !!}
                           {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}

                       </div>
                       <div class="form-group">
                       	   {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
                       </div>

                    {!! Form::close() !!}

                    @include('includes.form_error')
                </div>

            @endif    
          
                <hr>


                <!-- Posted Comments -->

                <!-- Comment -->
             @if(count($comments)>0)
                @foreach($comments as $comment)
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img height="64" class="media-object" src="{{$comment->photo?asset('public/images/'.$comment->photo):$post->photoPlaceholder()}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$comment->author}}
                                <small>{{$comment->created_at->diffForHumans()}}</small>
                            
                            </h4>
                           <p>{{$comment->body}}</p>


                           @if( count($comment->replies)>0)

                               @foreach($comment->replies as $reply)

                                  @if($reply->is_active == 1)

                                   <div style="margin-top: 40px;" class="media">
                                      <a class="pull-left" href="#">
                                          <img height="64" class="media-object" src="{{$reply->photo?asset('public/images/'.$reply->photo):$post->photoPlaceholder()}}" alt="">
                                      </a>
                                      <div class="media-body">
                                          <h4 class="media-heading">{{$reply->author}}
                                              <small>{{$reply->created_at->diffForHumans()}}</small>
                                          
                                          </h4>
                                          <p>{{$reply->body}}</p>
                                      </div>
                                    </div>
                                    
                                  @endif
                                @endforeach    

                            @endif

                            <div style="display: block;overflow: hidden;" class="btn-toggle-wraper">
                                <button style="margin-bottom: 20px;" class="toggle-reply btn btn-primary pull-right">Reply</button>
                            </div>

                            <div class="comment-reply">

                               {!! Form::open(['method'=>'POST','route'=>['user.reply'], 'autocomplete' =>'off', 'enctype' => 'multipart/form-data']) !!}

                                   <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                   
                                   <div class="form-group">

                                       {!! Form::label('body','Reply') !!}
                                       {!! Form::textarea('body',null,['class'=>'form-control','rows'=>2]) !!} 

                                   </div>
                                   <div class="form-group">
                                       {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
                                   </div>

                               {!! Form::close() !!}

                           </div>

                        </div>
                    </div>

                    <!-- Comment -->

                    <!-- <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            Nested Comment
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Nested Start Bootstrap
                                        <small>August 25, 2014 at 9:30 PM</small>
                                    </h4>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </div>
                            End Nested Comment
                        </div>
                    </div> -->

                @endforeach
            @endif    

@stop

@section('script')

<script>
    
    


      $('.toggle-reply').click(function(){

         $(this).parent().next().slideToggle('300');

      });
 


</script>

@stop