<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::orderBy('updated_at', 'desc')->paginate(20);

        //$options = OOOOO::orderBy('id')->get()->pluck('name', 'id');


       
        return view('admin.tag.index',compact('tags'));
        //return view('admin.tag.index',compact('tags','options'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Tag $tag)
    {
        //
        $tag->name = $request->input('name','');

        $tag->save();
        return redirect()->route('admin.tags.index')->with('message', '保存しました');;
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
        $tag = Tag::findOrFail($id);
        return view('admin.tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tag = Tag::findOrFail($id);
        //$options = OOOOO::orderBy('id')->get()->pluck('name', 'id');

        return view('admin.tag.edit', compact('tag'));
        //return view('admin.tag.index',compact('tags','options'));
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
        //
        $tag = Tag::findOrFail($id);
        $tag->name = $request->input('name');
        //$tag->body = $request->input('body');
        //$tag->thumbnail = $request->input('thumbnail');

        $tag->save();
        return redirect()->route('admin.tags.index')->with('message', '更新しました');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('admin.tags.index');
    }
}
