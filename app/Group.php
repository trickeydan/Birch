<?php

namespace Birch;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name','slug','parentgroup_id'];

    protected $visible = ['name'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function __toString()
    {
        return $this->name;
    }

    public function users(){
        return $this->hasMany('Birch\User');
    }

    public function permissions(){
        return $this->belongsToMany('Birch\Permission');
    }

    public function parent(){
        return $this->belongsTo('Birch\Group','parentgroup_id');
    }

    public function children(){
        return $this->hasMany('Birch\Group','parentgroup_id','id');
    }

    public function hasPermission($permission){
        if($this->permissions()->whereSlug($permission)->count() > 0){
            return true;
        }
        if($this->parent != null){
            return $this->parent->hasPermission($permission);
        }
        return false;

    }

    public static function exists($slug){
        return Group::whereSlug($slug)->count() > 0;
    }

    public static function listGroups($except = null){ //ToDo: Make this neat, this code can and should be done better.
        $groups = ['none' => 'None'];
        foreach (Group::all() as $group){
            if($group->slug != $except) {
                $groups[$group->slug] = $group->name;
            }
        }
        return $groups;
    }
}
