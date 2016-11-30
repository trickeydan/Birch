<?php

namespace Birch\Http\Controllers\Admin;

use Birch\Group;
use Birch\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Birch\Http\Requests;

class GroupController extends Controller
{
    public function index(){
        return view('admin.dashboard.groups.index',[
            'groups' => Group::all()
        ]);
    }
}
