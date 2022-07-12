<?php

namespace App\Http\Controllers;

use App\http\Models\rak;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class rakController extends Controller
{
    public function index()
    {
        $data = rak::all();
        return view('page.rak.index', compact('data'));
    }

    public function create()
    {
        return view('page.rak.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_rak' => 'required|max:20',
        ]);

        $data = rak::create($request->all());
        $data->nama_rak = $validate['nama_rak'];
        $data->save();
        if (!$data) {
            toastr()->error('Data has been not saved');
            return redirect('/dashboard/rak');
        } else {
            toastr()->success('Data has been saved successfully!');
            return redirect('/dashboard/rak');
        }
    }

    public function edit($id)
    {
        $data = rak::find($id);
        return view('page.rak.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_rak' => 'min:3',
        ]);

        $id = $request->id;
        if($id === null){
            toastr()->error('Id does not exist');
            return redirect()->back();
        }

        $rak = rak::find($id);
        $rak->nama_rak = $validate['nama_rak'];
        $rak->save();

        if (!$rak) {
            toastr()->error('Data has been not saved');
            return redirect('/dashboard/rak');
        } else {
            toastr()->success('Data has been saved successfully!');
            return redirect('/dashboard/rak');
        }
    }

    public function delete($id)
    {
        if (!$id) {
            toastr()->error('Data not found');
        } else {
            $data = rak::find($id);
            if ($data) {
                $data->delete();
                toastr()->success('Data has been delete successfully!');
                return redirect()->back();
            }
        }
    }
}
