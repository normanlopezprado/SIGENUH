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

        $hospital = Hospital::with(['floors.nivel'])->findOrFail($hospitalId);
        $floorId = $request->query('floor');
        $selectedFloor = $floorId
            ? HospitalFloor::where('hospital_id', $hospital->id)->where('id', $floorId)->first()
            : $hospital->floors->first();
        // Servicios ya asignados al piso actual (para mostrarlos y poder quitarlos)
        $selectedServiceIds = $selectedFloor
            ? $selectedFloor->services()->pluck('services.id')->toArray()
            : [];

        // Servicios asignados en OTROS pisos del MISMO hospital (excluye el actual)
        $inUseElsewhere = Service::whereHas('hospitalFloors', function ($q) use ($hospitalId, $selectedFloor) {
            $q->where('hospital_id', $hospitalId);
            if ($selectedFloor) {
                $q->where('hospital_floors.id', '!=', $selectedFloor->id);
            }
        })
            ->pluck('services.id')
            ->toArray();

        // Lista a mostrar = TODOS menos los usados en otros pisos + (los del piso actual)
        $services = Service::whereNotIn('id', $inUseElsewhere)
            ->orderBy('name')
            ->get();

        return view('hospital_floor_services.edit', [
            'hospital'           => $hospital,
            'floors'             => $hospital->floors,
            'selectedFloor'      => $selectedFloor,
            'services'           => $services,
            'selectedServiceIds' => $selectedServiceIds,
        ]);
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
            'services.*'  => ['uuid','exists:services,id'],
        ]);

        $floor = HospitalFloor::where('id', $data['floor'])
            ->where('hospital_id', $hospitalId)
            ->firstOrFail();

        $inUseElsewhere = Service::whereHas('hospitalFloors', function ($q) use ($hospitalId, $floor) {
            $q->where('hospital_id', $hospitalId)
                ->where('hospital_floors.id', '!=', $floor->id);
        })
            ->pluck('services.id')
            ->toArray();
        $allowedIds = Service::whereNotIn('id', $inUseElsewhere)->pluck('id')->toArray();

        $ids = array_values(array_intersect($data['services'] ?? [], $allowedIds));

        $currentlySelected = $floor->services()->pluck('services.id')->toArray();
        $ids = array_values(array_unique(array_merge($ids, array_intersect($currentlySelected, $data['services'] ?? []))));

        $floor->services()->sync($ids);

        return redirect()
            ->route('hospital-floor-services.edit', ['floor' => $floor->id])
            ->with('success', 'Servicios del piso actualizados correctamente.');
    }
}
