<?php

namespace App\Http\Controllers;

use App\Models\KecamatanExcelModel;
use Illuminate\Http\Request;
use App\Models\KecamatanModel;
use Yajra\DataTables\DataTables;

class KecamatanController extends Controller
{
    public function index(Request $request) {

        $data_excel = KecamatanExcelModel::latest()->get();
        if ($request->ajax()) {

            $data = KecamatanModel::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_kec="'.$row->id_kec.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.kecamatan.kecamatan', compact('data_excel'));
    }

    public function store(Request $request) {

        $kecamatan = $request->id_kec;
        KecamatanModel::updateOrCreate([
            'id_kec' => $kecamatan
        ],
        [
            'nama_kecamatan' => $request->nama_kecamatan,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($kecamatan);
    }

    public function edit(Request $request)
    {
        $where = array('id_kec' => $request->id_kec);
        $kecamatan  = KecamatanModel::where($where)->first();
        return response()->json($kecamatan);
        // $apotik = ApotikModel::find($id);
        // return response()->json($apotik);
    }

    //! Manual Excel

    public function indexExcel(Request $request) {

        if ($request->ajax()) {

            $data = KecamatanExcelModel::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_kecamatan_excel="'.$row->id_kecamatan_excel.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#excelModal" class="btn btn-sm btn-warning btn-icon-text editDataExcel">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function createExcel(Request $request) {

        $kecamatan = $request->id_kecamatan_excel;
        KecamatanExcelModel::updateOrCreate([
            'id_kecamatan_excel' => $kecamatan
        ],
        [
            'puskesmas' => $request->puskesmas,
            'lakilaki' => $request->lakilaki,
            'perempuan' => $request->perempuan,
            'total' => $request->perempuan + $request->lakilaki,
            'rumah_tangga' => $request->rumah_tangga,
            'luas_wilayah' => $request->luas_wilayah,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($kecamatan);
    }

    public function updateExcel(Request $request)
    {
        $where = array('id_kecamatan_excel' => $request->id_kecamatan_excel);
        $kecamatan  = KecamatanExcelModel::where($where)->first();
        return response()->json($kecamatan);
    }

}
