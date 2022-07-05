<?php

namespace App\Http\Controllers;

use App\http\Models\jenisData;
use Illuminate\Http\Request;

class jenisDataController extends Controller
{
    public function index()
    {
        $data = jenisData::all();
        return view('page.jenis-data.index', compact('data'));
    }

    public function create()
    {
        return view('page.jenis-data.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'jenis_data' => 'required|max:20',
        ]);

        $data = jenisData::create($request->all());
        $data->jenis_data = $validate['jenis_data'];
        $data->save();

        if (!$data) {
            toastr()->error('Data has been not saved');
            return redirect('/dashboard/jenis-data');
        } else {
            toastr()->success('Data has been saved successfully!');
            return redirect('/dashboard/jenis-data');
        }
    }

    public function delete($id)
    {
        if (!$id) {
            toastr()->error('Data not found');
        } else {
            $data = jenisData::find($id);
            if ($data) {
                $data->delete();
                toastr()->success('Data has been delete successfully!');
                return redirect()->back();
            }
        }
    }
}
