<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class maplopController extends Controller
{
    public function index()
    {
        return view('page.maplop.index');
    }
}
