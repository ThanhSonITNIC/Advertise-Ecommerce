<?php

namespace App\Http\Controllers\Administrator\Configures;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\File\Logo;

class LogoController extends Controller
{
    /**
     * Show list logo
     */
    public function index(){
        $logos = (new Logo)->get();
        return view('admin.configures.logo', compact('logos'));
    }
}