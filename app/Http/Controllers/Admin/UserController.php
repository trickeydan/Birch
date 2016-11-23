<?php

namespace Birch\Http\Controllers\Admin;

use Birch\User;
use Illuminate\Http\Request;

use Birch\Http\Requests;
use Birch\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(){
        return view('admin.dashboard.users.index',[
            'users' => User::where('id','!=',Auth::User()->id)->get()
        ]);
    }

    public function view(User $user){
        return view('admin.dashboard.users.view',[
            'viewing' => $user,
            'fields' => User::FIELDS,
        ]);
    }
}
