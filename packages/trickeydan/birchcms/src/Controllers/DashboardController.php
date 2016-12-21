<?php

namespace Trickeydan\Birchcms\Controllers;

use Illuminate\Http\Request;

use Birch\Http\Requests;
use Birch\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('birch::dashboard.index');
    }
}
