<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\DokterModel;

class DokterController extends Controller
{
    public function dokterPage() {
        $dokter = DokterModel::latest()->paginate();
        return view('dashboard.components.dokter.dokter', compact('dokter'));
    }

    public function addDokter(Request $request) {
        $validatedData = $request->validate([
            'name_dokter' => 'required|max:255',
            'alamat' => 'required',
            'defunct_ind' => 'required'
        ]);

        DokterModel::create($validatedData);

    }

    public function getDokterById($id) {
        $dokter = DokterModel::find($id);
        return $dokter;
    }

    public function updateDokter(Request $request) {

    }
}
