<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenggunaanObatModel;
use App\Models\TahunModel;
use DataTables;
use Alert;
use Illuminate\Support\Facades\DB;

class PenggunaanObatController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = DB::table('penggunaan_obat')
            ->join('tahun', 'penggunaan_obat.id_tahun', '=', 'tahun.id_tahun')
            ->select('penggunaan_obat.*', 'tahun.tahun')
            ->latest()
            ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_penggunaan_obat="'.$row->id_penggunaan_obat.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.penggunaan-obat.penggunaanObat', [
            'tahun' => TahunModel::all()
        ]);
    }

    public function store(Request $request) {

        $penggunaanObat = $request->id_penggunaan_obat;
        PenggunaanObatModel::updateOrCreate([
            'id_penggunaan_obat' => $penggunaanObat
        ],
        [
            'id_tahun' => $request->id_tahun,
            'obat_paten' => $request->obat_paten,
            'obat_generik' => $request->obat_generik,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($penggunaanObat);
    }

    public function edit(Request $request)
    {
        $where = array('id_penggunaan_obat' => $request->id_penggunaan_obat);
        $penggunaanObat  = PenggunaanObatModel::where($where)->first();
        return response()->json($penggunaanObat);
    }
}
