<?php

namespace Trickeydan\Birchcms\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('birch::dashboard.index');
    }
}
