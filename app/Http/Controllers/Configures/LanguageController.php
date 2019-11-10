<?php

namespace App\Http\Controllers\Configures;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class LanguageController extends Controller
{
    public function change($language)
    {
        Session::put('my_language', $language);
        return redirect()->back();
    }
}
