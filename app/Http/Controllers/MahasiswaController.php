<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    //
    public function index($id)
    {
        $user = Auth::user();
        // $mahasiswa = Mahasiswa::with('kelas')->get();
        $mahasiswa = Mahasiswa::with('kelas')->where('id_kelas', $id)->get();
        return view('admin/mahasiswaView', compact('user', 'mahasiswa'));
    }
}
