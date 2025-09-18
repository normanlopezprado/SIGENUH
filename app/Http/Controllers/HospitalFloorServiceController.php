<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Hospital;
use App\Models\HospitalFloor;
use Illuminate\Http\Request;

class HospitalFloorServiceController extends Controller
{
    public function edit(Request $request)
    {
        $hospitalId = $request->user()->hospital_selected;
        if (!$hospitalId) {
            return redirect()->route('dashboard')
                ->with('warning', 'Selecciona un hospital antes de administrar los servicios por piso.');
        }

        // Carga hospital con sus floors (cada floor está atado a un nivel)
        $hospital = Hospital::with(['floors.nivel'])->findOrFail($hospitalId);

        // Piso seleccionado por query ?floor=UUID; si no, el primero
        $floorId = $request->query('floor');
        $selectedFloor = $floorId
            ? HospitalFloor::where('hospital_id', $hospital->id)->where('id', $floorId)->first()
            : $hospital->floors->first();

        // Lista de servicios (si tienes status: ->where('status', true))
        $services = Service::orderBy('name')->get();

        // IDs ya asignados al piso
        $selectedServiceIds = $selectedFloor
            ? $selectedFloor->services()->pluck('services.id')->toArray()
            : [];

        return view('hospital_floor_services.edit', compact(
                'hospital', 'selectedFloor', 'services'
            ) + ['floors' => $hospital->floors, 'selectedServiceIds' => $selectedServiceIds]);
    }

    public function update(Request $request)
    {
        $hospitalId = $request->user()->hospital_selected;
        if (!$hospitalId) {
            return redirect()->route('dashboard')
                ->with('warning', 'Selecciona un hospital antes de administrar los servicios por piso.');
        }

        $data = $request->validate([
            'floor'       => ['required','uuid','exists:hospital_floors,id'],
            'services'    => ['array'],
            'services.*'  => ['uuid','exists:services,id'], // 👈 ahora services.id es UUID
        ]);

        $floor = HospitalFloor::where('id', $data['floor'])
            ->where('hospital_id', $hospitalId)
            ->firstOrFail();

        $ids = $data['services'] ?? [];
        $floor->services()->sync($ids);

        return redirect()
            ->route('hospital-floor-services.edit', ['floor' => $floor->id])
            ->with('success', 'Servicios del piso actualizados correctamente.');
    }
}
