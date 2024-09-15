<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    //
    public function show()
    {
        return Kelas::all();
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required',
        ]);

        $kelas = new Kelas();
        $kelas->nama_kelas = $request->input('nama_kelas');
        $kelas->save();

        return response()->json(['message' => 'kelas created successfully'], 201);
    }

    public function delete($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        if (!$kelas) {
            return response()->json(['message' => 'kelas not found'], 404);
        }
        $kelas->delete();
        return response()->json(['message' => 'kelas deleted successfully'], 200);
    }
}
