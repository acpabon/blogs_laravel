<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    private $colors = ['pink' => 'Rosado', 'red' => 'Rojo', 'blue' => 'Azul', 'yellow' => 'Amarillo', 'indigo' => 'Indigo', 'green' => 'Verde'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = $this->colors;
        return view('admin.tags.create', compact('colors'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:tags', 'slug' => 'required|unique:tags']);
        Tag::create($request->all());
        return redirect()->route('admin.tags.index')->with('info', 'Etiqueta creada con exito');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $colors = $this->colors;
        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate(['name' => ["required", Rule::unique('tags')->ignore($tag->id)], 'slug' => ["required", Rule::unique('tags')->ignore($tag->id)]]);
        $tag->update($request->all());
        return redirect()->route('admin.tags.index')->with('info', 'Etiqueta actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'Etiqueta eliminada con exito');
    }
}
