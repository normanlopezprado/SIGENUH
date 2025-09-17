<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Nivel;
use Illuminate\Http\Request;
class HospitalFloorController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();
        // Asumo que el usuario tiene hospital_id en users
        $hospital = Hospital::findOrFail($user->hospital_id);

        // Solo niveles activos (ajusta a tu gusto)
        $niveles = Nivel::where('status', true)->orderBy('order')->get();

        $seleccionados = $hospital->niveles()->pluck('niveles.id')->toArray();

        return view('hospital_floors.edit', compact('hospital','niveles','seleccionados'));
    }

    // Sincroniza la selección (asignar/retirar)
    public function update(Request $request)
    {
        $user = $request->user();
        $hospital = Hospital::findOrFail($user->hospital_selected);

        $data = $request->validate([
            'niveles'   => ['array'],
            'niveles.*' => ['uuid','exists:niveles,id'],
        ]);

        $ids = $data['niveles'] ?? [];

        $hospital->niveles()->sync($ids);

        return redirect()->route('hospital-floors.edit')->with('success', 'Niveles asignados correctamente.');
    }
}
