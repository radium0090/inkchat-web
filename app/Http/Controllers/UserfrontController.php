<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\User;
use App\Notifications\UserFollowedNotifi;

class UserfrontController extends Controller
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
    public function index(Request $request,$id)
    {
        $user = User::findOrFail($id);
        return view('front.userfront',compact('user'));
    }

    public function dofollow(Request $request)
    {
        $uid = $request->input("uid",'');
        auth()->user()->following()->attach($uid);
        //-----------------------------
        $follower = auth()->user();  //フォロワー元は自分
        $user = User::find($uid);    //フォロー先
        $user->notify(new UserFollowedNotifi($follower));
        //-------------------------------

        return ["result" => "followed"];
    }

    public function unfollow(Request $request)
    {
        $uid = $request->input("uid",'');
        auth()->user()->following()->detach($uid);

        return ["result" => "follow"];
    }

    public function followers($id)
    {

        $user = User::find($id);
        $followers = $user->followers()->get();
        return view('front.followers',compact('followers'));
    }

    public function following($id)
    {

        $user = User::find($id);
        $following = $user->following()->get();
        return view('front.following',compact('following'));
    }



}
