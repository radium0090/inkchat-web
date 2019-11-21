<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\User;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($catid=false)
    {
        
        $query = Post::orderBy('created_at','desc');
        if($catid){
            $query->whereCategoryId($catid);
        }
        $posts = $query->get();

        return view('front.index',compact('posts'));
    }

    public function detail($id)
    {
        $post = Post::find($id);
        return view('front.detail',compact('post'));
    }

    public function addcomment(Request $request,$id)
    {
        $user_id = auth()->user()->id;
        $body = $request->input('comment');

        $post = Post::find($id);

        $comment = $post->comments()->create([
            'body' => $body, 'user_id' => $user_id
        ]);

        return redirect('/p/' . $id);
    }



    

    
}
