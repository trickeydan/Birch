<?php

namespace Trickeydan\Birchcms\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Trickeydan\Birchcms\Page;

class PageController extends Controller
{
    public function index(){
        return view('birch::dashboard.pages.index');
    }
}
