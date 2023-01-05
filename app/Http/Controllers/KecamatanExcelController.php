<?php

namespace App\Http\Controllers;

use App\Exports\KecamatanExport;
use App\Imports\KecamatanImport;
use App\Models\KecamatanExcelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class KecamatanExcelController extends Controller
{
    public function index()
    {
        $data = KecamatanExcelModel::all();
        return view('dashboard.components.kecamatan.kecamatan', compact('data'));
    }

    public function import(Request $request)
    {
        // try {
            Excel::import(new KecamatanImport, $request->file('kecamatan'));
            Alert::success('Success', 'Import Berhasil');
            return back();
        // } catch (\Throwable $th) {
        //     Alert::error('Error', $th);
        //     return back();
        // }
    }

    public function export()
    {
        return Excel::download(new KecamatanExport, 'kecamatan.xlsx');
    }
}
