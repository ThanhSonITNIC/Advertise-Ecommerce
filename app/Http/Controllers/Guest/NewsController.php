<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(){
        return view('front.posts.index');
    }

    public function show(){
        return view('front.posts.show');
    }
}
