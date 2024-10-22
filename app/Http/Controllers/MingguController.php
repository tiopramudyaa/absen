<?php

namespace App\Http\Controllers;

use App\Models\Minggu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MingguController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $minggu = Minggu::select('nama_minggu')->distinct()->get();

        return view('admin/mingguView', compact('user', 'minggu'));
    }
}
