<?php

namespace App\Http\Controllers\Administrator\Configures;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\File\Banner;

class BannerController extends Controller
{
    /**
     * Show list baner
     */
    public function index(){
        $images = (new Banner)->get();
        return view('admin.configures.banner', compact('images'));
    }
}