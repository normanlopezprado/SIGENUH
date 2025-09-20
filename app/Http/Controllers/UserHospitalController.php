<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hospital;
class UserHospitalController extends Controller
{
    public function select(Hospital $hospital)
    {
        $user = Auth::user();
        $user->hospital_selected = $hospital->id;
        $user->save();

        return redirect()->route('dashboard')
            ->with('success', 'Hospital seleccionado: ' . $hospital->name);
    }
}
