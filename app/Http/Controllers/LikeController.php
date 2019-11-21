<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\User;
use App\Models\Like;
use Auth;

class LikeController extends Controller
{
    public function store(Request $request, $postId)
    {
        Like::create(['user_id' => Auth::user()->id,'post_id' => $postId]);

        $post = Post::findOrFail($postId);
        $post->increment('likes_count');

        return ['result' => 'liked','count' => $post->likes_count];
    }

    public function destroy(Request $request,$postId) {
        
      $post = Post::findOrFail($postId);
      $post->likes()->where('user_id',auth()->user()->id)->delete();
      $post->decrement('likes_count');

      return ['result' => 'like','count' => $post->likes_count];

    }



}
