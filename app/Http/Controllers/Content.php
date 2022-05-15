<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Content extends Controller
{
    public function header()
    {
        return view("content.header");
    }
    public function about()
    {
        return view("content.about");
    }
    public function contact()
    {
        return view("content.contact");
    }
    public function servies()
    {
        return view("content.servies");
    }
}
