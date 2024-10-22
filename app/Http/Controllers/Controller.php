<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    //
    public function dashboard()
    {
        // return view('welcome')
        $user = Auth::user();

        return view('admin/dashboardView', compact('user'));
    }
    
}
