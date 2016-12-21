<?php

namespace Trickeydan\Birchcms\Http\Controllers;

use Birch\User;
use Illuminate\Http\Request;
use Trickeydan\Birchcms\Http\Requests\CreateUserRequest;

use Birch\Http\Requests;
use Birch\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(){
        return view('birch::dashboard.users.index',[
            'users' => User::where('id','!=',Auth::User()->id)->get()
        ]);
    }

    public function create(){
        return view('birch::dashboard.users.create',[
            'fields' => User::FIELDS,
        ]);
    }

    public function createPost(CreateUserRequest $request){

        $newUser = User::newUser($request->username,$request->name,$request->email);
        if(!$newUser){
            return redirect(route('admin.users.create'))->withErrors(['That user could not be created.']);
        }
        return redirect(route('admin.users.view',$newUser->username));
    }

    public function view(User $user){
        if($user->id == Auth::User()->id) return redirect(route('admin.settings.index'));
        return view('birch::dashboard.users.view',[
            'viewing' => $user,
            'fields' => User::FIELDS,
        ]);
    }

    public function update(User $user){
        if($user->id == Auth::User()->id) return redirect(route('admin.settings.index'));
        return view('birch::dashboard.users.update',[
            'viewing' => $user,
            'fields' => User::FIELDS,
        ]);
    }

    public function updatePost(Request $request,User $user){
        if($user->id == Auth::User()->id) return redirect(route('admin.settings.index'));
        $arr = [];
        foreach(User::FIELDS as $field => $data){
            if($data['editable']) $arr[$field] = $data['validation'];
        }
        $this->validate($request,$arr);
        foreach(User::FIELDS as $field => $data){
            if($data['editable']) $user->$field = $request->$field;
        }
        $user->save();
        return redirect(route('admin.users.view',$user))->with('status','Updated user.');

    }

    public function sendResetLink(User $user){
        if($user->id == Auth::User()->id) return redirect(route('admin.settings.index'));
        $user->sendResetLink();
        return redirect(route('admin.users.view',$user))->with('status','Reset link sent.');
    }
}
