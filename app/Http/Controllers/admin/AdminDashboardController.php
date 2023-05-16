<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // to dashboard page
    public function index() {

        return view('admin-panel.dashboard');
    }
}
