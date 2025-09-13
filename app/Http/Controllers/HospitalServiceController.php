<?php

namespace App\Http\Controllers;

use App\Models\HospitalService;
use Illuminate\Http\Request;
use App\Http\Requests\HospitalServiceRequest;
class HospitalServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = HospitalService::latest()->get();
        return view('hospital_services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hospital_services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
    {
        HospitalService::create($request->all()); // si usas Request normal: $request->all() con fillable
        return redirect()->route('hospital-services.index')
            ->with('success', 'Servicio creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HospitalService $hospitalService)
    {
        return view('hospital_services.show', compact('hospitalService'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HospitalService $hospitalService)
    {
        return view('hospital_services.edit', compact('hospitalService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, HospitalService $hospitalService)
    {
        $hospitalService->update($request->all());
        return redirect()->route('hospital-services.index')
            ->with('success', 'Servicio actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HospitalService $hospitalService)
    {
        $hospitalService->delete();
        return redirect()->route('hospital-services.index')
            ->with('success', 'Servicio eliminado.');
    }
}
