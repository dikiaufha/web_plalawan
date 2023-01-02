<?php

namespace App\Http\Controllers;

use App\Imports\KecamatanImport;
use App\Models\KecamatanExcelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class KecamatanExcelController extends Controller
{
    public function index() {
        $data = KecamatanExcelModel::all()->latest();
        return view('dashboard.components.kecamatan.kecamatan', compact('data'));
    }

    public function import(Request $request) {
        Excel::import(new KecamatanImport, $request->file('kecamatan'));
        Alert::success('Success', 'Import Berhasil');
    }


}
