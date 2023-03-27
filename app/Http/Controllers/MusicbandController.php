<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicbandController extends Controller
{
    public function index()
    {
        return view('base');
    }
}
