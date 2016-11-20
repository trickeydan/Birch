<?php

namespace Birch;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
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

    public function hasPermission($permission){
        return $this->permissions()->whereSlug($permission)->count() > 0;
    }
}
