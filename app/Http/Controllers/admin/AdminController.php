<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function logout()
    {
        Auth::logout();
        // Redireccionamos a login
        return redirect()->route('login')->with('success', 'Saliste del sistema');
    }
}