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
        $idUser = User::where('id', $user)->first();
        $status = status::all();
        $jenisData = jenisData::all();
        $rak = rak::all();
        return view('page.maplop.create', compact('user', 'idUser', 'jenisData', 'rak', 'status'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'status_id' => 'required|max:20',
            'rak_id' => 'required|max:20',
            'jenis_data_id' => 'required|max:20',
            'kode_cabang' => 'required|max:11',
            'kode_user' => 'required|max:30',
            'nama_maplop' => 'required|max:50',
        ]);

        $data = new maplop();
        $data->status_id = $validate['status_id'];
        $data->rak_id = $validate['rak_id'];
        $data->jenis_data_id = $validate['jenis_data_id'];
        $data->kode_cabang = $validate['kode_cabang'];
        $data->kode_user = $validate['kode_user'];
        $data->nama_maplop = $validate['nama_maplop'];
        $data->save();
        if (!$data) {
            toastr()->error('Data has been not saved');
            return redirect('/dashboard/maplop');
        } else {
            toastr()->success('Data has been saved successfully!');
            return redirect('/dashboard/maplop');
        }
    }

    public function edit($id)
    {
        $user = Auth::user()->id;
        $idUser = User::where('id', $user)->first();
        $data = maplop::find($id);
        $status = status::all();
        $jenisData = jenisData::all();
        $rak = rak::all();
        return view('page.maplop.edit', compact('data', 'status', 'jenisData', 'rak', 'idUser'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'status_id' => 'required|max:20',
            'rak_id' => 'required|max:20',
            'jenis_data_id' => 'required|max:20',
            'kode_cabang' => 'required|max:11',
            'kode_user' => 'required|max:30',
            'nama_maplop' => 'required|max:50',
        ]);

        $id = $request->id;
        $data = maplop::find($id);
        $data->status_id = $validate['status_id'];
        $data->rak_id = $validate['rak_id'];
        $data->jenis_data_id = $validate['jenis_data_id'];
        $data->kode_cabang = $validate['kode_cabang'];
        $data->kode_user = $validate['kode_user'];
        $data->nama_maplop = $validate['nama_maplop'];
        $data->save();

        if (!$data) {
            toastr()->error('Data has been not saved');
            return redirect('/dashboard/maplop');
        } else {
            toastr()->success('Data has been edit successfully!');
            return redirect('/dashboard/maplop');
        }
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
