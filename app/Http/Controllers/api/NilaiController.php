<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use App\Models\RiwayatPenilaian;
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
        $request['tanggal'] = $today;
        $validatedData = $request->validate([
            'id_mahasiswa' => 'required',
            'jenis_penilaian' => 'required',
            'nilai' => 'required',
            'id_user' => 'required',
            'komen' => 'required',
            'id_minggu' => 'required',
            'tanggal' => 'required',
        ]);

        $penilaian = new Penilaian();
        $penilaian = Penilaian::create($request->all());
        $penilaian->save();


        // Create Riwayat Penilaian
        $riwayat = new RiwayatPenilaian();
        $request['id_penilaian'] = $penilaian['id'];
        $request['id_user_ubah'] = $request->input('id_user');
        $request['waktu_ubah'] = $today;
        $request['nilai_lama'] = 0;
        $request['nilai_baru'] = $request->input('nilai');
        $riwayat = RiwayatPenilaian::create($request->all());
        $riwayat->save();

        return response()->json(['message' => 'penilaian created successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        $today = date('Y-m-d');
        $nilai_lama = Penilaian::where('id', $id)->value('nilai');
        // return $nilai_lama;
        $user_ubah_lama = Penilaian::where('id', $id)->value('id_user');
        $request['tanggal'] = $today;
        $validatedData = $request->validate([
            'id_mahasiswa' => '',
            'jenis_penilaian' => '',
            'nilai' => '',
            'id_user' => '',
            'komen' => '',
            'id_minggu' => '',
            'tanggal' => '',
        ]);

        $penilaian = Penilaian::findOrFail($id);
        $penilaian->update($request->all());

        // Create Riwayat Penilaian
        $riwayat = new RiwayatPenilaian();
        $request['id_penilaian'] = $penilaian['id'];
        $request['id_user_ubah'] = $user_ubah_lama;
        $request['waktu_ubah'] = $today;
        $request['nilai_lama'] = $nilai_lama;
        $request['nilai_baru'] = $request->input('nilai');
        $riwayat = RiwayatPenilaian::create($request->all());
        $riwayat->save();

        return response()->json(['message' => 'penilaian updated successfully'], 200);
    }

    public function delete($id)
    {
        $penilaian = Penilaian::find($id);
        $penilaian->delete();

        return response()->json(['message' => 'penilaian deleted successfully'], 200);
    }
}
