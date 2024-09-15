<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    //

    public function show()
    {
        return Penilaian::all();
    }

    public function create(Request $request)
    {
        $today = date('Y-m-d');
        $validatedData = $request->validate([
            'id_mahasiswa' => 'required',
            'jenis_penilaian' => 'required',
            'nilai' => 'required',
            'id_user' => 'required',
            'urutan' => 'required',
            'komen' => 'required',
        ]);

        $penilaian = new Penilaian();
        $penilaian->id_mahasiswa = $request->input('id_mahasiswa');
        $penilaian->tanggal = $today;
        $penilaian->jenis_penilaian = $request->input('jenis_penilaian');
        $penilaian->nilai = $request->input('nilai');
        $penilaian->id_user = $request->input('id_user');
        $penilaian->urutan = $request->input('urutan');
        $penilaian->komen = $request->input('komen');
        $penilaian->save();

        return response()->json(['message' => 'penilaian created successfully'], 201);
    }
}
