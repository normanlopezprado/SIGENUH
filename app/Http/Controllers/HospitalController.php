<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospitals = Hospital::latest()->paginate(10);
        return view('hospitals.index', compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hospitals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required','string','max:120'],
            'description' => ['nullable','string'],
            'address'     => ['nullable','string','max:255'],
            'logo'        => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
            'icon'        => ['nullable','image','mimes:png,webp,ico','max:256'],
            'latitude'    => ['nullable','numeric','between:-90,90'],
            'longitude'   => ['nullable','numeric','between:-180,180'],
        ]);

        if ($request->hasFile('logo')) {
            // Guarda en storage/app/public/logos
            $data['logo_path'] = $request->file('logo')->store('logos', 'public');
        }
        if ($request->hasFile('icon')) {
            // Guarda en storage/app/public/logos
            $data['icon_path'] = $request->file('icon')->store('icons', 'public');
        }
        $hospital = Hospital::create($data);

        return redirect()->route('hospitals.show', $hospital)
            ->with('success', 'Hospital creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital)
    {
        return view('hospitals.show', compact('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital)
    {
        return view('hospitals.edit', compact('hospital'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hospital $hospital)
    {
        $data = $request->validate([
            'name'        => ['required','string','max:120'],
            'description' => ['nullable','string'],
            'address'     => ['nullable','string','max:255'],
            'logo'        => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
            'icon'        => ['nullable','image','mimes:png,webp,ico','max:256'],
            'latitude'    => ['nullable','numeric','between:-90,90'],
            'longitude'   => ['nullable','numeric','between:-180,180'],
        ]);
        if ($request->hasFile('logo')) {
            // Borra el anterior si existía
            if ($hospital->logo_path) {
                Storage::disk('public')->delete($hospital->logo_path);
            }
            $data['logo_path'] = $request->file('logo')->store('logos', 'public');
        }
        if ($request->hasFile('icon')) {
            // Borra el anterior si existía
            if ($hospital->logo_path) {
                Storage::disk('public')->delete($hospital->logo_path);
            }
            $data['icon_path'] = $request->file('icon')->store('icons', 'public');
            $hospital->update($data);

            return redirect()->route('hospitals.show', $hospital)
                ->with('success', 'Hospital actualizado correctamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital)
    {
        if ($hospital->logo_path) {
            Storage::disk('public')->delete($hospital->logo_path);
        }
        $hospital->delete();

        return redirect()->route('hospitals.index')
            ->with('success', 'Hospital eliminado.');
    }
}
