<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Events\GotNewFollower;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc');
        return view('mypage.home',compact('posts'));
    }

    public function thumbnail()
    {
        $posts = Post::orderBy('created_at','desc');
        return view('mypage.thumbnail',compact('posts'));
    }

    public function uploadThumbnail(Request $request)

    {
        $image = $request->image;

        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= auth()->user()->id .'_' .time().'.png';
        $path = public_path('upload/'.$image_name);

        file_put_contents($path, $image);

        auth()->user()->thumbnail = '/upload/'.$image_name;
        auth()->user()->save();

        return response()->json(['status'=>true]);
    }

    public function profile()
    {
        $user = auth()->user();
        return view('mypage.editprofile',compact('user'));
    }

    public function updateprofile(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('mypage.home')->with('message', '更新しました');;
    }

    public function password()
    {
        return view('mypage.changepass',['user'=>auth()->user()]);
    }
    
    public function updatepassword(Request $request)
    {
        if (!(\Hash::check($request->get('current-password'), \Auth::user()->password))) {
            return redirect()->back()->with("message","旧パスワードは違います、再度入力してください。");
        }
         
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("message","現在のパスワードと同じものは設定できません。");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        $user = \Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect('/mypage/home')->with("message","パスワード変更しました!");
    }

    public function likedposts(Request $request){
        $likedposts = Post::whereHas('likes',function ($query) {
            $query->where('user_id',\Auth::user()->id);
        })->get();

        return view('mypage.likedposts',compact('likedposts')); 
    }

    public function getNewFollower(){
        $follower = auth()->user();
        
        broadcast(new GotNewFollower($follower));

        return  "OK" . $follower->name . '/' . $follower->id;
    }

    public function showUserNotifications(){
        return view('mypage.shownotifications'); 
    }

    


    
}
