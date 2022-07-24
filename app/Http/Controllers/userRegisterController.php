<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userRegisterController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('page.register.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|max:40',
            'username' => 'required|max:30',
            'kode_user' => 'required|max:20',
            'jenis_kelamin' => 'required|max:20',
            'user_role' => 'required|max:20',
            'password' => 'required|max:20',
        ]);


        $user = new User();
        $user->name = $validate['name'];
        $user->email = $validate['email'];
        $user->username = $validate['username'];
        $user->kode_user = $validate['kode_user'];
        $user->jenis_kelamin = $validate['jenis_kelamin'];
        $user->user_role = $validate['user_role'];
        $user->password = Hash::make($validate['password']);
        $user->save();


        if ($user) {
            toastr()->success('Data has been saved successfully!');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('page.register.edit', compact('data'));
    }

    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();

        if ($data) {
            toastr()->success('Data has been delete successfully!');
            return redirect()->back();
        } else {
            toastr()->error('Server error!');
            return redirect()->back();
        }
    }
}
