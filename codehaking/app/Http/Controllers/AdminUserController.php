<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        
        return view('admin.user.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::pluck('name','id')->all();

        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $input = $request->all();

        if( $file=$request->file('photo_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('public/images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;   
        }

        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect('/admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        $roles = Role::pluck('name','id')->all();

        return view('admin.user.edit',compact('user','roles' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {

        $user = User::findOrFail($id);

        if(trim($request->password) == ''){

            $input = $request->except('password');

        }else{
            
            $input =  $request->all();

             $input['password'] = bcrypt($request->password);

        }

        if($file = $request->file('photo_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('public/images',$name); 

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        } 

        $user->update($input);

        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = User::findOrFail($id);

       unlink('public/images/'.$user->photo->file);

       $user->delete();

       return redirect('/admin/user');
    }
}