<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userRegisterController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('page.register.index', compact('data'));
    }

    // public function store(Request $request)
    // {
    //     $validate = $request->validate([
    //         'name' => 'required|min:3',
    //         'email' => 'required|max:40',
    //         'username' => 'required|max:30',
    //         'kode_user' => 'required|max:20',
    //         'jenis_kelamin' => 'required|max:20',
    //         'user_role' => 'required|max:20',
    //         'password' => 'required|max:20',
    //     ]);


    //     $user = new User();
    //     $user->name = $validate['name'];
    //     $user->email = $validate['email'];
    //     $user->username = $validate['username'];
    //     $user->kode_user = $validate['kode_user'];
    //     $user->jenis_kelamin = $validate['jenis_kelamin'];
    //     $user->user_role = $validate['user_role'];
    //     $user->password = Hash::make($validate['password']);
    //     $user->save();


    //     if ($user) {
    //         toastr()->success('Data has been saved successfully!');
    //         return redirect()->back();
    //     }
    // }
    public function store(Request $request, $id = null)
    {
        try {
            if ($id) {
                $user = User::where('id', $id)->with([])->first();
                if (!$user) {
                    toastr()->success('Data has been saved successfully!');
                    return redirect()->back();
                }
                $user->name = $request->name;
                $user->user_role = $request->user_role;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->kode_user = $request->kode_user;
                $user->jenis_kelamin = $request->jenis_kelamin;
                $user->password = Hash::make($request->password);
                $user->save();
                if ($user) {
                    toastr()->success('Data has been edit successfully!');
                    return redirect()->back();
                }
            }

            $user = new User();
            $user->name = $request->name;
            $user->user_role = $request->user_role;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->kode_user = $request->kode_user;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->password = Hash::make($request->password);
            $user->save();

            if ($user) {
                toastr()->success('Data has been saved successfully!');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            return redirect()->back();
            toastr()->error($message);

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

    public function profile()
    {
        $data = Auth::user();
        return view('page.profile.index', compact('data'));
    }

    public function editProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'username' => 'required|min:2',
            'email' => 'required|min:1',
            'jenis_kelamin' => 'required|min:1',
        ]);
        $input = $request->all();
        $data = user::find($id);
        $data->update($input);

        toastr()->success('Selamat! Data Profile berhasil diperbaharui.');
        return redirect()->back();
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:2',
            'confirm_password' => 'required|min:2|same:password'
        ]);

        $data = User::find($id);
        $data->update([
            'password' => Hash::make($request->password)
        ]);

        toastr()->success('Selamat! Password berhasil diperbaharui.');
        return redirect()->back();
    }
}
