<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Alert;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function index()
    {
        return view('dashboard.components.user.user');
    }

    public function read()
    {
        $data = User::all();
        return view('dashboard.components.user.read')->with([
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('dashboard.components.user.create');
    }

    public function store(Request $request)
    {
        $data['nama'] = $request->nama;
        $data['role'] = $request->role;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        User::insert($data);
    }

    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('dashboard.components.user.edit')->with([
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->nama = $request->nama;
        $data->role = $request->role;
        $data->email = $request->email;
        $data->password = $data->password;
        $data->save();
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
    }
}
