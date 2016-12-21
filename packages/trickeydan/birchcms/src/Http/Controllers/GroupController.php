<?php

namespace Trickeydan\Birchcms\Http\Controllers;

use Birch\Group;
use Birch\User;
use Illuminate\Http\Request;

use Trickeydan\Birchcms\Http\Requests\GroupCreateRequest;
use Trickeydan\Birchcms\Http\Requests\GroupUpdateRequest;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index(){
        return view('birch::dashboard.groups.index',[
            'groups' => Group::all()
        ]);
    }

    public function create(){
        $groups = Group::listGroups();
        return view('birch::dashboard.groups.create',compact('groups'));
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
        return view('birch::dashboard.groups.view',compact('group'));
    }

    public function update(Group $group){
        $groups = Group::listGroups($group->slug);
        return view('birch::dashboard.groups.update',compact('group','groups'));
    }

    public function updatePost(Group $group, GroupUpdateRequest $request){
        $group->name = $request->name;
        if(Group::exists($request->parentgroup_id) && $request->parentgroup_id != $group->slug){
            $group->parentgroup_id = Group::whereSlug($request->parentgroup_id)->first()->id;
            $group->save();
            return redirect(route('admin.groups.view',$group))->with('status','Group Updated.');
        }
        return redirect(route('admin.groups.view',$group))->with('status','Group Updated. Couldn\'t associate parent.');
    }

    public function members(Group $group){
        return view('birch::dashboard.groups.members',compact('group'));
    }

    public function memberRemove(Group $group, User $user){
        if($user->id == Auth::User()->id)  return redirect(route('admin.groups.members',$group))->withErrors('You cannot remove yourself from a group.');
        if($user->group_id != $group->id) return redirect(route('admin.groups.members',$group))->withErrors('That user doesn\'t belong to that group.');
        if($group->slug == 'default') return redirect(route('admin.groups.members',$group))->withErrors('You cannot remove users from this group.');
        $user->group_id = Group::whereSlug('default')->first()->id;
        $user->save();
        return redirect(route('admin.groups.members',$group))->with('status',$user->name . ' has been removed from ' . $group->name . '.');
    }

    public function permissions(Group $group){
        return view('birch::dashboard.groups.permissions',compact('group'));
    }

    public function delete(Group $group){
        if($group->users()->count() != 0) return redirect(route('admin.groups.view',$group))->withErrors('Please remove all users before attempting to delete.');
        if($group->children()->count() != 0) return redirect(route('admin.groups.view',$group))->withErrors('Please remove all child groups before attempting to delete.');
        $group->delete();
        return redirect(route('admin.groups.index'))->with('status','Group Deleted.');
    }
}
