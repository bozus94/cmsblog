<?php

namespace App\Http\Controllers\admin;

use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tags.index')->only('index');
        $this->middleware('permission:tags.show')->only('show');
        $this->middleware('permission:tags.create')->only(['create', 'store']);
        $this->middleware('permission:tags.edit')->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'DESC')->paginate(8);

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\TagStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
        $tag = Tag::create($request->validated());

        return redirect()->route('tags.edit', $tag->id)
                         ->with('info', 'la etiqueta se creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));  
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TagUpdateRequest  $request
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $tag->fill($request->validated())->save();

        return redirect()->route('tags.edit', $tag->id)
                         ->with('info', 'la etiqueta se modifico correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')
                         ->with('info', 'la etiqueta se elimino correctamente');

    }
}
