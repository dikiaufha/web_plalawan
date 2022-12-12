<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Alert;

class UserController extends Controller
{
   public function index() {
    return view('dashboard.components.user.user', [
        'user' => User::all()
    ]);
  }

  public function store(Request $request) {

    $validatedData = $request->validate([
        'nama' => 'required|max:255',
        'role' => 'required',
        'image' => 'image|file',
        'email' => 'required|email:dns|max:255|unique:users',
        'password' => 'required|min:5|max:255'
    ]);

    if ($request->file('image')) {
        $validatedData['image'] = $request->file('image')->store('images');
    }

    $validatedData['password'] = Hash::make($validatedData['password']);

    User::create($validatedData);

    return redirect('/user');
  }

  public function edit(Request $request)
  {
      $where = array('id' => $request->id);
      $user  = UserModel::where($where)->first();
      return response()->json($user);
      // $apotik = ApotikModel::find($id);
      // return response()->json($apotik);
  }
}
