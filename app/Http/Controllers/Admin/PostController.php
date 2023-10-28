<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');

        return view('admin.posts.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        Post::create($request->all());

        return redirect()->route('admin.posts.index')->with('info', 'Post creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::pluck('name', 'id');

        return view('admin.posts.edit', compact('tags', 'categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $post->update($request->all());

        return redirect()->route('admin.posts.index')->with('info', 'Post actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('info', 'Post eliminado con exito');
    }
}
