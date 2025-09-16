<?php

namespace App\Http\Controllers;

use App\Models\Hospital;

class DashboardController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::where('status', true)->latest();
        return view('dashboard', compact('hospitals'));
    }
}
