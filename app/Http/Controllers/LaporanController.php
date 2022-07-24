<?php

namespace App\Http\Controllers;

use App\Http\Models\maplop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function laporanAda(Request $request)
    {
        $ada = maplop::whereStatusId(1)->get();

        $start = date("Y-m-d", strtotime($request->start));
        $end = date("Y-m-d", strtotime($request->end));

        if ($request->start && $request->end) {
            $ada = $ada->whereBetween('created_at', [$start, $end]);
        }

        return view('page.laporan.laporanAda', compact('ada'));
    }

    public function laporanSudahdipusat(Request $request)
    {
        $sudahDiPusat = maplop::whereStatusId(2)->get();

        $start = date("Y-m-d", strtotime($request->start));
        $end = date("Y-m-d", strtotime($request->end));

        if ($request->start && $request->end) {
            $sudahDiPusat = $sudahDiPusat->whereBetween('created_at', [$start, $end]);
        }

        return view('page.laporan.laporanSudahdipusat', compact('sudahDiPusat'));
    }

    public function laporanSudahdimusnahkan(Request $request)
    {
        $sudahDimusnahkan = maplop::whereStatusId(3)->get();

        $start = date("Y-m-d", strtotime($request->start));
        $end = date("Y-m-d", strtotime($request->end));

        if ($request->start && $request->end) {
            $sudahDimusnahkan = $sudahDimusnahkan->whereBetween('created_at', [$start, $end]);
        }

        return view('page.laporan.laporanSudahdimusnahkan', compact('sudahDimusnahkan'));
    }

    public function laporanSeluruhData(Request $request)
    {
        $laporanseluruhData = maplop::all();

        $start = date("Y-m-d", strtotime($request->start));
        $end = date("Y-m-d", strtotime($request->end));

        if ($request->start && $request->end) {
            $laporanseluruhData = $laporanseluruhData->whereBetween('created_at', [$start, $end]);
        }

        return view('page.laporan.laporanSeluruhdataLaporan', compact('laporanseluruhData'));
    }

    public function printPdfAda(Request $request)
    {
        $data = maplop::whereStatusId(1)->get();
        $text = 'Laporan ada';
        $user = Auth::user()->id;
        $idUser = User::where('id', $user)->first();

        $start = date("Y-m-d 00:00:00", strtotime($request->start));
        $end = date("Y-m-d 23:59:59", strtotime($request->end));

        if ($request->start && $request->end) {
            $data = $data->whereBetween('created_at', [$start, $end]);
        }

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('page.laporan.print-pdf', compact(
            'data', 'text', 'idUser'
        ));

        return $pdf->stream("Laporan.pdf");
    }

    public function printPdfdipusat(Request $request)
    {
        $data = maplop::whereStatusId(2)->get();
        $text = 'Laporan di pusat';
        $user = Auth::user()->id;
        $idUser = User::where('id', $user)->first();

        $start = date("Y-m-d 00:00:00", strtotime($request->start));
        $end = date("Y-m-d 23:59:59", strtotime($request->end));

        if ($request->start && $request->end) {
            $data = $data->whereBetween('created_at', [$start, $end]);
        }

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('page.laporan.print-pdf', compact(
            'data', 'text', 'idUser'
        ));

        return $pdf->stream("Laporan.pdf");
    }


    public function printPdfdimusnahkan(Request $request)
    {
        $data = maplop::whereStatusId(3)->get();
        $text = 'Laporan di musnahkan';
        $user = Auth::user()->id;
        $idUser = User::where('id', $user)->first();

        $start = date("Y-m-d 00:00:00", strtotime($request->start));
        $end = date("Y-m-d 23:59:59", strtotime($request->end));

        if ($request->start && $request->end) {
            $data = $data->whereBetween('created_at', [$start, $end]);
        }

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('page.laporan.print-pdf', compact(
            'data', 'text', 'idUser'
        ));

        return $pdf->stream("Laporan.pdf");
    }

    public function printPdfSeluruh(Request $request)
    {
        $data = maplop::all();

        $text = 'Laporan keseluruhan';
        $user = Auth::user()->id;
        $idUser = User::where('id', $user)->first();

        $start = date("Y-m-d 00:00:00", strtotime($request->start));
        $end = date("Y-m-d 23:59:59", strtotime($request->end));

        if ($request->start && $request->end) {
            $data = $data->whereBetween('created_at', [$start, $end]);
        }

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('page.laporan.print-pdf', compact(
            'data', 'text', 'idUser'
        ));

        return $pdf->stream("Laporan.pdf");
    }
}
