<?php

namespace App\Http\Controllers;

use App\Exports\DesaExport;
use App\Imports\DesaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class DesaExcelController extends Controller
{
    public function import(Request $request)
    {
        // try {
            Excel::import(new DesaImport, $request->file('desa'));
            Alert::success('Success', 'Import Berhasil');
            return back();
        // } catch (\Throwable $th) {
        //     Alert::error('Error', $th);
        //     return back();
        // }
    }

    public function export()
    {
        return Excel::download(new DesaExport, 'desa.xlsx');
    }
}
