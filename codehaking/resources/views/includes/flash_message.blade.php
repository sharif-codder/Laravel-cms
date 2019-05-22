


@if(Session::has('comment_message'))

 <div class="alert alert-success text-center">

 	{{session('comment_message')}}
 	
 </div>
    
@endif