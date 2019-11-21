<?php

namespace App\Http\Controllers\Mypage;

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
        $posts = Post::whereUserId(auth()->user()->id)->orderBy('updated_at', 'desc')->paginate(20);
       
        return view('mypage.post.index',compact('posts'));

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

        return view('mypage.post.create',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Post $post)
    {
         
        $tagnames  = explode(',',$request->input('newtag'));
        
        $tag_ids = [];
        foreach ($tagnames as $tagname) {
            # code...
            $tag = Tag::firstOrCreate(['name' => trim($tagname)]);
            $tag_ids[] = $tag->id;
        }
        //dd($tag_ids);
        //
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->thumbnail = $request->input('thumbnail');
        $post->category_id = $request->input('category_id');
        $post->user_id = auth()->user()->id;

        if($request->file('file')){
            if ($request->file('file')->isValid([])) {
                $filename = $request->file->store('/public/upload');
                $post->thumbnail = "/storage/upload/" . basename($filename);
            }
        }

        $post->save();

        //$post->tags()->sync($request->input('tag'));
        $post->tags()->sync($tag_ids);

        return redirect()->route('top')->with('message', '投稿しました');;
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
        return view('mypage.post.show', compact('post'));
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

        return view('mypage.post.edit', compact('post','tags','categories'));
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

        return redirect()->route('mypage.posts.index')->with('message', '更新しました');;
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
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('mypage.posts.index');
    }
}
