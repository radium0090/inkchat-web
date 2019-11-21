<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class PasswordController extends Controller
{
    
    public function edit()
    {
        //
        $user = auth('admin')->user();
        //$options = OOOOO::orderBy('id')->get()->pluck('name', 'id');

        return view('admin.password.edit', compact('user'));
        //return view('admin.user.index',compact('users','options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        

        if (!(\Hash::check($request->get('current-password'), auth('admin')->user()->password))) {
            return redirect()->back()->with("message","旧パスワードは違います、再度入力してください。");
        }
         
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("message","現在のパスワードと同じものは設定できません。");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);
        $user = auth('admin')->user();
        $user->password = bcrypt($request->get('new-password'));
        
        $user->save();
        return redirect()->route('admin.password')->with('message', 'パスワード更新しました');;
    }
}
