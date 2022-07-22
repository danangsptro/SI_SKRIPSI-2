<?php

namespace App\Http\Controllers;

use App\Http\Models\maplop;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $ada = maplop::whereStatusId(1)->get();
        $sudahDipusat = maplop::whereStatusId(2)->get();
        $sudahDimusnahkan = maplop::whereStatusId(3)->get();
        $totalKeseluruhan = maplop::all();
        return view('page.laporan.index', compact('sudahDimusnahkan', 'sudahDipusat','ada', 'totalKeseluruhan'));
    }
}
