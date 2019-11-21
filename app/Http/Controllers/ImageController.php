<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ImageController extends Controller

{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()

    {
      return view('front.imageUpload');
    }



    public function uploadImage(Request $request)

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

}