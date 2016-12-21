<?php

namespace Trickeydan\Birchcms;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function groups(){
        return $this->belongsToMany('Trickeydan\Birchcms\Group');
    }
}
