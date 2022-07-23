<?php

namespace App\Http\Controllers;

use App\Http\Models\maplop;
use App\User;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class dashboardController extends Controller
{
    public function index()
    {
        $user = User::all();
        $id = Auth::user()->id;
        $name = User::where('id', $id)->first();
        $maplop = maplop::all();
        return view('page.home.index', compact('user', 'maplop', 'name'));
    }
}
