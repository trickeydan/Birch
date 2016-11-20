<?php

namespace Birch;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function groups(){
        return $this->belongsToMany('Birch\Group');
    }
}
