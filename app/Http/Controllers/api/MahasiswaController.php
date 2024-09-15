<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //
    public function show()
    {
        return Mahasiswa::all();
    }

    public function showByKelas($id_kelas)
    {
        $mahasiswa = Mahasiswa::where('id_kelas', $id_kelas)->get();

        if ($mahasiswa->isEmpty()) {
            return response()->json(['message' => 'mahasiswa not found'], 404);
        }

        return $mahasiswa;
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'npm' => 'required',
            'id_kelas' => 'required',
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->npm = $request->input('npm');
        $mahasiswa->id_kelas = $request->input('id_kelas');
        $mahasiswa->save();

        return response()->json(['message' => 'mahasiswa created successfully'], 201);
    }

    public function delete($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        if (!$mahasiswa) {
            return response()->json(['message' => 'mahasiswa not found'], 404);
        }
        $mahasiswa->delete();
        return response()->json(['message' => 'mahasiswa deleted successfully'], 200);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        if (!$mahasiswa) {
            return response()->json(['message' => 'mahasiswa not found'], 404);
        }

        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->npm = $request->input('npm');
        $mahasiswa->id_kelas = $request->input('id_kelas');
        $mahasiswa->save();

        return response()->json(['message' => 'mahasiswa updated successfully'], 200);
    }
}
