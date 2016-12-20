<?php

namespace Birch\Http\Controllers\Admin;

use Birch\Group;
use Birch\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Birch\Http\Requests;
use Birch\Http\Requests\GroupCreateRequest;

class GroupController extends Controller
{
    public function index(){
        return view('admin.dashboard.groups.index',[
            'groups' => Group::all()
        ]);
    }

    public function create(){ //ToDo: Make this neat, this code can and should be done better.
        $groups = ['none' => 'None'];
        foreach (Group::all() as $group){
            $groups[$group->slug] = $group->name;
        }
        return view('admin.dashboard.groups.create',compact('groups'));
    }

    public function createPost(GroupCreateRequest $request){
        $g = new Group();
        $g->name = $request->name;
        $g->slug = $request->slug;
        if(Group::exists($request->parentgroup_id)){
            $g->parentgroup_id = Group::whereSlug($request->parentgroup_id)->first()->id;
            $g->save();
            return redirect(route('admin.groups.view',$g))->with('status','Group Created.');
        }
        $g->save();
        return redirect(route('admin.groups.index'))->with('status','Group Created. Couldn\'t associate parent.');
    }

    public function view(Group $group){
        return view('admin.dashboard.groups.view',compact('group'));
    }

    public function delete(Group $group){
        if($group->users()->count() != 0) return redirect(route('admin.groups.view',$group))->withErrors('Please remove all users before attempting to delete.');
        if($group->children()->count() != 0) return redirect(route('admin.groups.view',$group))->withErrors('Please remove all child groups before attempting to delete.');
        $group->delete();
        return redirect(route('admin.groups.index'))->with('status','Group Deleted.');
    }
}
