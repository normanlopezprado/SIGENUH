<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\HospitalFloorService;
use App\Models\Service;
use Illuminate\Http\Request;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beds = Bed::with('hospitalFloorService')->latest()->get();
        return view('beds.index', compact('beds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $hospitalId = $request->user()->hospital_selected;
        if (!$hospitalId) {
            return redirect()->route('dashboard')
                ->with('warning', 'Selecciona un hospital antes de crear una cama.');
        }
        $hfs = HospitalFloorService::with(['service', 'hospitalFloor.nivel'])
            ->whereHas('hospitalFloor', fn($q) => $q->where('hospital_id', $hospitalId))
            ->orderBy(Service::select('name')->whereColumn('services.id', 'hospital_floor_services.service_id'))
            ->get();
        return view('beds.create', compact('hfs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'hospital_floor_service_id' => ['required','uuid','exists:hospital_floor_services,id'],
            'code'   => ['required','string','max:50','unique:beds,code'],
            'status' => ['required','in:Disponible,Ocupada'],
            'notes'  => ['nullable','string'],
        ]);
        Bed::create($data);

        return redirect()->route('beds.index')
            ->with('success', 'Cama creada correctamente ✅');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bed $bed)
    {
        return view('beds.show', compact('bed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bed $bed)
    {
        $services = HospitalFloorService::all();
        return view('beds.edit', compact('bed', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bed $bed)
    {
        $data = $request->validate([
            'code'   => 'required|string|max:50|unique:beds,code,' . $bed->id . ',id',
            'status' => 'required|in:Disponible,Ocupada',
            'notes'  => 'nullable|string',
            'hospital_floor_service_id' => 'required|uuid|exists:hospital_floor_services,id',
        ]);

        $bed->update($data);

        return redirect()->route('beds.index')
            ->with('success', 'Cama actualizada correctamente ✏️');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bed $bed)
    {
        $bed->delete();

        return redirect()->route('beds.index')
            ->with('success', 'Cama eliminada correctamente 🗑️');
    }
}
