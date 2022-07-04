<?php

namespace App\Http\Controllers;

use App\http\Models\status;
use Illuminate\Http\Request;

class statusController extends Controller
{
    public function index()
    {
        $status = status::all();
        return view('page.status.index', compact('status'));
    }

    public function create()
    {
        return view('page.status.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_status' => 'required|max:20',
        ]);

        $status = status::create($request->all());
        $status->nama_status = $validate['nama_status'];
        $status->save();

        if (!$status) {
            toastr()->error('Data has been not saved');
            return redirect('/dashboard/status');
        } else {
            toastr()->success('Data has been saved successfully!');
            return redirect('/dashboard/status');
        }
    }
}
