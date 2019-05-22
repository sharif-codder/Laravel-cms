<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Category;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //

    public function index(){

        $postCount = Post::count();
        $commentCount = Comment::count();
        $categoryCount = Category::count();

    	return view('admin.index',compact('postCount','commentCount','categoryCount'));

    }
}
