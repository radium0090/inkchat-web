<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');//RedirectIfAuthenticated 
    }

    protected function authenticated(Request $request, $user)
    {
        //
        redirect()->intended("/admin/home");
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        
        /*同じドメインの一緒ログアウト障害
        $request->session()->flush();
        $request->session()->regenerate();
        $request->session()->invalidate();
        */
 
        return  redirect()->route('admin.login');
    }

    public function username()
    {
        return 'email';
    }
}
