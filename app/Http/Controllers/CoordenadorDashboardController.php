<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CoordenadorDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('coordenador.dashboard', compact('user'));
    }
}
