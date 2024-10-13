<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // method for load admin dashboard
    public function loadAdminDashboard() {
        return view('dashboard');
    }
}
