<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Minggu;
use Illuminate\Http\Request;

class MingguController extends Controller
{
    //
    function show()
    {
        $minggu = Minggu::all();
        return response()->json([
            'message' => 'Success',
            'data' => $minggu
        ]);
    }

    function create(Request $request)
    {
        $minggu = new Minggu();
        $minggu->nama_minggu = $request->nama_minggu;
        $minggu->id_mahasiswa = $request->id_mahasiswa;
        $minggu->save();

        return response()->json([
            'message' => 'Success',
            'data' => $minggu
        ]);
    }

    function delete($id)
    {
        $minggu = Minggu::find($id);
        $minggu->delete();

        return response()->json([
            'message' => 'Success',
            'data' => $minggu
        ]);
    }

    function update(Request $request, $id)
    {
        $minggu = Minggu::find($id);
        $minggu->nama_minggu = $request->nama_minggu;
        $minggu->save();

        return response()->json([
            'message' => 'Success',
            'data' => $minggu
        ]);
    }
}
