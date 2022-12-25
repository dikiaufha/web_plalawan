<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAsetModel;
use App\Models\OrganisasiModel;
use App\Models\JenisAsetModel;
use App\Models\TahunModel;
use Alert;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class TahunAsetController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = DB::table('tahun_aset')
                    ->join('organisasi', 'tahun_aset.id_organisasi', '=', 'organisasi.id_organisasi')
                    ->join('jenis_aset', 'tahun_aset.id_jenis_aset', '=', 'jenis_aset.id_jenis_aset')
                    ->join('tahun', 'tahun_aset.id_tahun', '=', 'tahun.id_tahun')
                    ->select('tahun_aset.*', 'organisasi.name_organisasi', 'jenis_aset.nama_aset', 'tahun.tahun')
                    ->latest()
                    ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_tahun_aset="'.$row->id_tahun_aset.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-warning btn-icon-text editData">Edit <i
                    class="bi bi-pencil-square"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.tahun-aset.tahunAset',[
            'organisasi' => OrganisasiModel::all()->where('defunct_ind', 'N'),
            'jenisAset' => JenisAsetModel::all()->where('defunct_ind', 'N'),
            'tahun' => TahunModel::all(),
        ]);
    }

    public function store(Request $request) {

        $tahunAset = $request->id_tahun_aset;
        TahunAsetModel::updateOrCreate([
            'id_tahun_aset' => $tahunAset
        ],
        [
            'id_organisasi' => $request->id_organisasi,
            'id_jenis_aset' => $request->id_jenis_aset,
            'id_tahun' => $request->id_tahun,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($tahunAset);
    }

    public function edit(Request $request)
    {
        $where = array('id_tahun_aset' => $request->id_tahun_aset);
        $tahunAset  = TahunAsetModel::where($where)->first();
        return response()->json($tahunAset);
        // $apotik = ApotikModel::find($id);
        // return response()->json($apotik);
    }
}
