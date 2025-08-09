<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Konstruktor ini memastikan hanya user login yang bisa akses dashboard
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan halaman dashboard
    public function index()
    {
        return view('dashboard'); // resources/views/dashboard.blade.php
    }
}
