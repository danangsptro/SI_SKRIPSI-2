<?php

namespace App\Http\Controllers;

use App\http\Models\jenisData;
use App\Http\Models\maplop;
use App\http\Models\rak;
use App\http\Models\status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class maplopController extends Controller
{
    public function index()
    {
        $data = maplop::all();
        return view('page.maplop.index', compact('data'));
    }

    public function create()
    {
        $user = Auth::user()->id;
        $idUser = DB::table('users')->where('id', $user)->first();
        $status = status::all();
        $jenisData = jenisData::all();
        $rak = rak::all();
        return view('page.maplop.create', compact('user', 'idUser', 'jenisData', 'rak', 'status'));
    }

    public function delete($id)
    {
        $data = maplop::find($id);
        $data->delete();

        if ($data) {
            $data->delete();
            toastr()->success('Data has been delete successfully!');
            return redirect()->back();
        }
    }
}
