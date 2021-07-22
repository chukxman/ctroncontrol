<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index() {
        return view('welcome.blade.php');
    }

    public function about() {
        return view('about.blade.php');
    }

    public function features() {
        return view('features.blade.php');
    }

    public function contact() {
        return view('contact.blade.php');
    }
}
