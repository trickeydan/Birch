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
}
