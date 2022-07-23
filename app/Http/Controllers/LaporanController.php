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
        return view('page.laporan.index', compact('sudahDimusnahkan', 'sudahDipusat', 'ada', 'totalKeseluruhan'));
    }

    public function laporanAda()
    {
        $ada = maplop::whereStatusId(1)->get();
        return view('page.laporan.laporanAda', compact('ada'));
    }

    public function laporanSudahdipusat()
    {
        $sudahDiPusat = maplop::whereStatusId(2)->get();
        return view('page.laporan.laporanSudahdipusat', compact('sudahDiPusat'));
    }

    public function laporanSudahdimusnahkan()
    {
        $sudahDimusnahkan = maplop::whereStatusId(3)->get();
        return view('page.laporan.laporanSudahdimusnahkan', compact('sudahDimusnahkan'));
    }

    public function laporanSeluruhData()
    {
        $laporanseluruhData = maplop::all();
        return view('page.laporan.laporanSeluruhdataLaporan', compact('laporanseluruhData'));
    }
}
