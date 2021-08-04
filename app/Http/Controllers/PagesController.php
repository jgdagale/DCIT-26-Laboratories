<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        $title = 'Welcome to my First Laboratory';
        return view('pages.home')->with('title', $title);
    }
}
