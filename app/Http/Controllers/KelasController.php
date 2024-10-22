<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $kelas = Kelas::all();
        return view('admin/kelas/kelasView', compact('user', 'kelas'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('admin/kelas/tambah-kelasView', compact('user'));
    }

    public function createAction(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|size:1|unique:kelas,nama_kelas', // Aturan validasi
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect('/kelas');
    }

    public function edit($id)
    {
        $user = Auth::user();
        // $kelas = Kelas::all();
        $kelas = Kelas::find($id);
        return view('admin/kelas/edit-kelasView', compact('user', 'kelas'));
    }

    public function editAction(Request $request, $id)
    {
        // $user = Auth::user();
        // $kelas = Kelas::all();
        $kelas_baru = Kelas::find($id);

        $request->validate([
            'nama_kelas' => 'required|string|size:1|unique:kelas,nama_kelas,' . $id,
        ]);
        $kelas_baru->nama_kelas = $request->nama_kelas;
        $kelas_baru->save();

        return redirect('kelas');
        // return view('admin/kelas', compact('user', 'kelas'));

    }

    public function delete($id)
    {
        Kelas::destroy($id);
        return redirect('/kelas');
    }
}
