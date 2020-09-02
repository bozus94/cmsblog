<?php

namespace App\Http\Controllers\admin;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:posts.index')->only('index');
        $this->middleware('permission:posts.show')->only('show');
        $this->middleware('permission:posts.create')->only(['create', 'store']);
        $this->middleware('permission:posts.edit')->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', '===', Auth::user()->id)->oderBy('id', 'DESC')->paginate(8);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->pluck('name', 'id');
        $tags = Tag::orderBy('id', 'DESC')->get();

        return view('admin.posts.create', compact(['tags', 'categories']));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PostStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = Post::create($request->validated());
        
       if($request->file('file')){
  
            $path = Storage::disk('images_posts')->put('', $request->file('file'));

            if($path){
                $image_path = asset('images/posts/' . $path);
                $post->fill(['file' => $path, 'ff_path' => $image_path])->save();   
            }         
        }  
        $post->tags()->attach($request->input('tags'));

        return redirect()->route('posts.edit', $post->id)
                         ->with('info', 'la Entrada se creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $this->authorize('pass', $post);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('pass', $post);

        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->get();
        return view('admin.posts.edit', compact(['post', 'tags', 'categories']));  
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryUpdateRequest  $request
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {   
        $this->authorize('pass', $post);

        $image_old = $post->file ? $post->file : null;

        $post->fill($request->validated())->save();

        if($request->file('file')){

            if($image_old){
                Storage::disk('images_posts')->delete($image_old);
            }
  
            $path = Storage::disk('images_posts')->putFile('', $request->file('file'));

            if($path){
                $image_path = asset('images/posts/' . $path);
                $post->fill(['file' => $path, 'ff_path' => $image_path])->save();   
            }         
        }

        $post->tags()->sync($request->input('tags'));

        return redirect()->route('posts.edit', $post->id)
                         ->with('info', 'la Entrada se modifico correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('pass', $post);

        if($post->file){
            Storage::disk('images_posts')->delete($post->file);
        }
        $post->delete();

        return redirect()->route('posts.index')
                         ->with('info', 'la Entrada se elimino correctamente');

    }
}
