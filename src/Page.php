<?php

namespace Trickeydan\Birchcms;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function ownable(){
        return $this->morphTo();
    }
}
