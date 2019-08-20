<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function dashboard(){
        return view('pages.dashboard');
    }

    public function tables(){
        return view('pages.tables');

    }
}
