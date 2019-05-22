@extends('layouts.admin')


@section('content')
 
   <h1>Media</h1>
<div class="com-md-12">
  <form action="{{url('/delete/media')}}" method="post" >
      
      {{csrf_field()}}

     <div class="form-group">
        <select class="btn btn-default">
            <option>Delete</option>
        </select>
      <input type="submit" name="delete_all" value="submit" class="btn btn-primary">
    </div>

    <table class="table table-striped">
     	  <tr>
          <th><input class="checkBoxes" type="checkbox" id="option"></th>
     	  	<th>Id</th>
     	  	<th>File</th>
     	  	<th>Creation date</th>
     	  </tr>
     	  
    	  @if($medias)

    	    @foreach($medias as $media)
              <tr>
                <td><input class="checkBoxes" type="checkbox" name="checkboxArray[]" value="{{$media->id}}"></td>
              	<td>{{$media->id}}</td>
              	<td><img height="100" width="100" src="{{asset('public/images/'.$media->file)}}" alt=""></td>
              	<td>
                  {{$media->created_at?$media->created_at:'no date'}}
                  <input type="hidden"  name="photo_id" value="{{$media->id}}">
                </td>
              </tr>
    	    @endforeach

    	  @endif
    </table>

  </form>
</div>   

@stop

@section('script')

<script>

  $(document).ready(function(){
       
      $('#option').click(function(){

        if(this.checked){

           $('.checkBoxes').each(function(){

              this.checked = true;

           });

        }else{

          $('.checkBoxes').each(function(){

            this.checked = false;

          });

        }

      });

   });

</script>

@stop