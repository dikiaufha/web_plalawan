<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\DokterModel;

class DokterController extends Controller
{
    public function dokterPage(Request $request) {
        if ($request->ajax()) {
        $data = DokterModel::latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    }

    public function addDokter(Request $request) {
        $validatedData = $request->validate([
            'name_dokter' => 'required|max:255',
            'alamat' => 'required',
            'defunct_ind' => 'required'
        ]);

        DokterModel::create($validatedData);

    }
}
