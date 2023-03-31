<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\app;
use App\Models\User;
use Illuminate\Http\Request;

class lp_viewController extends Controller
{
    public function index(){
        
        return view('landing.main');
    }
}
