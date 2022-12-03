<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenggunaanKontrasepsiModel;
use App\Models\TahunModel;
use App\Models\AlatKontrasepsiModel;
use DataTables;
use Alert;
use Illuminate\Support\Facades\DB;

class PenggunaanKontrasepsiController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = DB::table('penggunaan_kontrasepsi')
            ->join('tahun', 'penggunaan_kontrasepsi.id_tahun', '=', 'tahun.id_tahun')
            ->join('alat_kontrasepsi', 'penggunaan_kontrasepsi.id_kontrasepsi', '=', 'alat_kontrasepsi.id_kontrasepsi')
            ->select('penggunaan_kontrasepsi.*', 'tahun.tahun', 'alat_kontrasepsi.nama_kontrasepsi')
            ->latest()
            ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_penggunaan_kontrasepsi="'.$row->id_penggunaan_kontrasepsi.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.penggunaan-kontrasepsi.penggunaanKontrasepsi', [
            'tahun' => TahunModel::all(),
            'alatKontrasepsi' => AlatKontrasepsiModel::all()->where('defunct_ind', 'N'),
        ]);
    }

    public function store(Request $request) {

        $penggunaanKontrasepsi = $request->id_penggunaan_kontrasepsi;
        PenggunaanKontrasepsiModel::updateOrCreate([
            'id_penggunaan_kontrasepsi' => $penggunaanKontrasepsi
        ],
        [
            'id_tahun' => $request->id_tahun,
            'id_kontrasepsi' => $request->id_kontrasepsi,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($penggunaanKontrasepsi);
    }

    public function edit(Request $request)
    {
        $where = array('id_penggunaan_kontrasepsi' => $request->id_penggunaan_kontrasepsi);
        $penggunaanKontrasepsi  = PenggunaanKontrasepsiModel::where($where)->first();
        return response()->json($penggunaanKontrasepsi);
    }
}
