<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
        public function index()
    {
        $user = Auth::user();
        $empresa = $user->empresa;
        $empresa_id = $user->empresa_id;

        return view('dashboard', compact('user', 'empresa', 'empresa_id'));
    }
}