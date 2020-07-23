<?php

namespace App\Http\Controllers\admin;

use App\Tag;
use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)
                                            ->paginate();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::orderBy('name', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        
        return view('admin.posts.create', compact(['categories', 'tags']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = Post::create($request->all());

       if($request->file('file')){
  
            $path = Storage::disk('images_posts')->put('', $request->file('file'));

            if($path){
                $image_path = asset('images/posts/' . $path);
                $post->fill(['file' => $path, 'ff_path' => $image_path])->save();   
            }         
        }   

        $post->tags()->attach($request->input('tags'));

        return redirect()->route('posts.edit', $post->id)
                        ->with('info', 'La entrada se ha creado correctamente');
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $this->authorize('pass', $post);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);
        $this->authorize('pass', $post);
        
        $tags = Tag::orderBy('name', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.posts.edit', compact(['post', 'tags', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::find($id);
        $this->authorize('pass', $post);

        $image_old = $post->file ? $post->file : null;

        $post->fill($request->all())->save();

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
                        ->with('info', 'La entrada se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $this->authorize('pass', $post);

        if($post->file){
            Storage::disk('images_posts')->delete($post->file);
        }
        $post->delete();

        return redirect()->route('posts.index')
                        ->with('info', 'la Entrada se elimino correctamente');
    }
}
