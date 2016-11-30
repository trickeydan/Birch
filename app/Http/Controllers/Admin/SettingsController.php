<?php

namespace Birch\Http\Controllers\Admin;

use Birch\User;
use Illuminate\Http\Request;

use Birch\Http\Requests;
use Birch\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Birch\Notifications\PasswordChanged;
class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.settings.index',[
            'fields' => User::FIELDS,
        ]);
    }

    public function passwordChange(Request $request)
    {
        return view('admin.dashboard.settings.changepassword');
    }

    public function passwordChangePost(Request $request)
    {
        $this->validate($request,[
            'oldpassword' => 'required|pwdcorrect',
            'password' => 'required|confirmed|min:8|max:50'
        ]);
        if($request->oldpassword == $request->password) return redirect(route('admin.settings.changepassword'))->withErrors('Your new password must be different.');

        $user = Auth::User();
        $user->password = bcrypt($request->password);
        $user->save();
        $user->notify(new PasswordChanged());

        return redirect(route('admin.settings.index'))->with('status','Password Changed');
    }

    public function updateUser(){
        return view('admin.dashboard.settings.update',[
            'fields' => User::FIELDS,
        ]);
    }

    public function updateUserPost(Request $request){
        $user = Auth::User();
        $arr = [];
        foreach(User::FIELDS as $field => $data){
            if($data['editable']) $arr[$field] = $data['validation'];
        }
        $this->validate($request,$arr);
        foreach(User::FIELDS as $field => $data){
            if($data['editable']) $user->$field = $request->$field;
        }
        $user->save();
        return redirect(route('admin.settings.index'))->with('status','Profile updated.');
    }
}
