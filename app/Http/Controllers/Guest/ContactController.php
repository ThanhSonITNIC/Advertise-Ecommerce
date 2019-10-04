<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        return view('front.contact.index');
    }
}
