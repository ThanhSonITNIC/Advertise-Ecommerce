<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index(){
        return view('front.posts.show');
    }
}
