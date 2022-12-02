<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenyakitMenonjolModel;
use App\Models\TahunModel;
use App\Models\PenyakitModel;
use DataTables;
use Alert;
use Illuminate\Support\Facades\DB;

class PenyakitMenonjolController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = DB::table('sepuluh_penyakit_menonjol')
            ->join('tahun', 'sepuluh_penyakit_menonjol.id_tahun', '=', 'tahun.id_tahun')
            ->join('penyakit', 'sepuluh_penyakit_menonjol.id_penyakit', '=', 'penyakit.id_penyakit')
            ->select('sepuluh_penyakit_menonjol.*', 'tahun.tahun', 'penyakit.nama_penyakit')
            ->latest()
            ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_penyakit_menonjol="'.$row->id_penyakit_menonjol.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-gradient-info btn-icon-text editData">Edit <i
                    class="mdi mdi-file-check btn-icon-append"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.penyakit-menonjol.penyakitMenonjol', [
            'tahun' => TahunModel::all(),
            'penyakit' => PenyakitModel::all()->where('defunct_ind', 'N'),
        ]);
    }

    public function store(Request $request) {

        $penyakitMenonjol = $request->id_penyakit_menonjol;
        PenyakitMenonjolModel::updateOrCreate([
            'id_penyakit_menonjol' => $penyakitMenonjol
        ],
        [
            'id_tahun' => $request->id_tahun,
            'id_penyakit' => $request->id_penyakit,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($penyakitMenonjol);
    }

    public function edit(Request $request)
    {
        $where = array('id_penyakit_menonjol' => $request->id_penyakit_menonjol);
        $penyakitMenonjol  = PenyakitMenonjolModel::where($where)->first();
        return response()->json($penyakitMenonjol);
    }
}
