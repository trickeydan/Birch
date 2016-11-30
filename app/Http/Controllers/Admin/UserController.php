<?php

namespace Birch\Http\Controllers\Admin;

use Birch\User;
use Illuminate\Http\Request;
use Birch\Http\Requests\CreateUserRequest;

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

    public function create(){
        return view('admin.dashboard.users.create',[
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
        return view('admin.dashboard.users.view',[
            'viewing' => $user,
            'fields' => User::FIELDS,
        ]);
    }

    public function update(User $user){
        return view('admin.dashboard.users.update',[
            'viewing' => $user,
            'fields' => User::FIELDS,
        ]);
    }

    public function updatePost(Request $request,User $user){
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
        $user->sendResetLink();
        return redirect(route('admin.users.view',$user))->with('status','Reset link sent.');
    }
}
