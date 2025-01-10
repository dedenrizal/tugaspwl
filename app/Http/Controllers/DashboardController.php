<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Dashboard dengan data sesuai role
        return view('dashboard.admin', [
            'user' => $user,
        ]);
    }
}
