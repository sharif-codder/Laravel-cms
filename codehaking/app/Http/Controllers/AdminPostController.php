<?php

namespace App\Http\Controllers;

use App\Post;
use App\Photo;
use App\Category;
use App\Commnet;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::pluck('name','id')->all();
        
        return view('admin.posts.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $inputs =$request->all();

        $user = Auth::user();

        if($file = $request->file('photo_id')){

            $name = time().$file->getClientOriginalName();

           $file->move('public/images',$name);

            $photo = Photo::create(['file'=>$name]);

            $inputs['photo_id'] = $photo->id;

        }

        $user->post()->create($inputs);

        return redirect('admin/post');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::pluck('name','id');

        return view('admin.posts.edite',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        
        if($file = $request->file('photo_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('public/images',$name);

            $photo = Photo::create(['file'=>$name]);

            $inputs['photo_id'] = $photo->id;

        }


        Auth::user()->post()->whereId($id)->first()->update($inputs);
        
        return redirect('admin/post');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if($post->photo){
           unlink('public/images/'.$post->photo->file);
        }

        $post->delete();

        $post->photo->delete();

        return redirect('admin/post');
    }

}
