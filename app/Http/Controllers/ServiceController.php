<?php

namespace App\Http\Controllers;

use App\Models\HospitalService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = HospitalService::latest()->get();
        return view('servicios.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        HospitalService::create($request->all()); // si usas Request normal: $request->all() con fillable
        return redirect()->route('servicios.index')
            ->with('success', 'Servicio creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HospitalService $servicio)
    {
        return view('servicios.show', compact('hospitalService'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HospitalService $servicio)
    {
        return view('servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HospitalService $servicio)
    {
        $servicio->update($request->all());
        return redirect()->route('servicios.index')
            ->with('success', 'Servicio actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HospitalService $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicios.index')
            ->with('success', 'Servicio eliminado.');
    }
}
