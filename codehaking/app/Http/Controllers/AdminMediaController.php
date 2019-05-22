<?php

namespace App\Http\Controllers;

use App\Photo;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminMediaController extends Controller
{
    
   public function index(){

       $medias = Photo::all();

       return view('admin.media.index',compact('medias'));
   }

   public function create(){

   	  return view('admin.media.create');
   }

   public function store(Request $request){

   	    $file = $request->file('file');

   	    $name = time(). $file->getClientOriginalName();

   	    $file->move('public/images',$name);

   	    Photo::create(['file'=>$name]);
   }

   public function destroy($id){

   	    $photo = Photo::findOrFail($id);

        unlink('public/images/'.$photo->file);

        $photo->delete();

        return redirect('/admin/media');

   }

   public function deleteMedia(Request $request){

      if(isset($request->delete_all)){

         $photos = Photo::findOrFail($request->checkboxArray);

          foreach ($photos as $photo){
              
            $this->destroy($photo->id);

          }
          
          return redirect('admin/media');

        }  

       
   }

}
