<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('updated_at', 'desc')->paginate(20);
       
        return view('admin.post.index',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::get()->pluck('name', 'id');   
        $categories = Category::get()->pluck('name', 'id');  

        return view('admin.post.create',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Post $post)
    {
        //
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->thumbnail = $request->input('thumbnail');
        $post->category_id = $request->input('category_id');

        $post->save();

        $post->tags()->sync($request->input('tag'));

        return redirect()->route('admin.posts.index')->with('message', '保存しました');;
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
        $post = Post::findOrFail($id);
        return view('admin.post.show', compact('post'));
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
        $post = Post::findOrFail($id);
        $tags = Tag::get()->pluck('name', 'id');   
        $categories = Category::get()->pluck('name', 'id'); 

        return view('admin.post.edit', compact('post','tags','categories'));
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
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->thumbnail = $request->input('thumbnail');
        $post->category_id = $request->input('category_id');

        $post->save();

        $post->tags()->sync($request->input('tag'));

        return redirect()->route('admin.posts.index')->with('message', '更新しました');;
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
        $coupon = Post::findOrFail($id);
        $coupon->delete();
        return redirect()->route('admin.posts.index');
    }
}
