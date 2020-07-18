<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PageController extends Controller
{
    public function blog(){
        $posts = Post::orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(7);
        return view('web.posts', compact('posts'));
    }

    public function category($slug){
        $category = Category::where('slug', $slug)->pluck('id')->first();
        $posts = Post::where('category_id', $category)->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(7);

        return view('web.posts', compact('posts'));
    }

    public function tag($slug){
        $posts = Post::whereHas('tags', function ($query) use($slug){
            $query->where('slug', $slug);
        })->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(7);

        return view('web.posts', compact('posts'));
    }
    
    public function post($slug){
        $post = Post::where('slug', $slug)->first();
        return view('web.post', compact('post'));
    }
}       
