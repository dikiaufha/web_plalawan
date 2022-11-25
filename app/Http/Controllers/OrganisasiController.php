<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganisasiModel;
use App\Models\KecamatanModel;
use App\Models\JenisOrganisasiModel;
use App\Models\DesaModel;
use DataTables;
use Alert;
use Illuminate\Support\Facades\DB;

class OrganisasiController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {

            $data = DB::table('organisasi')
            ->join('kecamatan', 'organisasi.id_kec', '=', 'kecamatan.id_kec')
            ->join('desa', 'organisasi.id_desa', '=', 'desa.id_desa')
            ->join('jenis_organisasi', 'organisasi.id_jenis', '=', 'jenis_organisasi.id_jenis')
            ->select('organisasi.*', 'kecamatan.nama_kecamatan', 'desa.nama_desa',  'jenis_organisasi.nama_organisasi')
            ->latest()
            ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id_organisasi="'.$row->id_organisasi.'" data-original-title="Edit"data-bs-toggle="modal"
                    data-bs-target="#formModal" class="btn btn-sm btn-gradient-info btn-icon-text editData">Edit <i
                    class="mdi mdi-file-check btn-icon-append"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.components.organisasi.organisasi', [
            'kecamatan' => KecamatanModel::all()->where('defunct_ind', 'N'),
            'jenisorg' => JenisOrganisasiModel::all()->where('defunct_ind', 'N'),
            'desa' => DesaModel::all()->where('defunct_ind', 'N')
        ]);
    }

    public function store(Request $request) {

        $organisasi = $request->id_organisasi;
        OrganisasiModel::updateOrCreate([
            'id_organisasi' => $organisasi
        ],
        [
            'name_organisasi' => $request->name_organisasi,
            'id_jenis' => $request->id_jenis,
            'kelompok' => $request->kelompok,
            'id_desa' => $request->id_desa,
            'id_kec' => $request->id_kec,
            'defunct_ind' => $request->defunct_ind,
        ]);
        return response()->json($organisasi);
    }

    public function edit(Request $request)
    {
        $where = array('id_organisasi' => $request->id_organisasi);
        $organisasi  = OrganisasiModel::where($where)->first();
        return response()->json($organisasi);
    }
}
