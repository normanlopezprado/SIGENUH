<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospitals = Hospital::latest()->paginate(10);
        return view('hospitales.index', compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hospitales.create');
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
            'email'       => ['nullable','string','max:255'],
            'phone'       => ['nullable','string','max:10'],
            'logo'        => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
            'icon'        => ['nullable','image','mimes:png,webp,ico','max:256'],
            'latitude'    => ['nullable','numeric','between:-90,90'],
            'longitude'   => ['nullable','numeric','between:-180,180'],
        ]);
        $uuid = (string) Str::uuid();
        $data['id'] = $uuid;

        if ($request->hasFile('logo')) {
            $ext = $request->file('logo')->extension();
            $filename = "{$uuid}.{$ext}";
            $request->file('logo')->storeAs('logos', $filename, 'public');
            $data['logo_path'] = "logos/{$filename}";
        }

        if ($request->hasFile('icon')) {
            $ext = $request->file('icon')->extension();
            $filename = "{$uuid}.{$ext}";
            $request->file('icon')->storeAs('icons', $filename, 'public');
            $data['icon_path'] = "icons/{$filename}";
        }
        Hospital::create($data);

        return redirect()->route('hospitales.index')
            ->with('success', 'Hospital creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital)
    {
        return view('hospitales.show', compact('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital)
    {
        return view('hospitales.edit', compact('hospital'));
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
            'email'       => ['nullable','string','max:255'],
            'phone'       => ['nullable','string','max:10'],
            'logo'        => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
            'icon'        => ['nullable','image','mimes:png,webp,ico','max:256'],
            'latitude'    => ['nullable','numeric','between:-90,90'],
            'longitude'   => ['nullable','numeric','between:-180,180'],
        ]);
        $uuid = $hospital->id; // usamos el mismo id (UUID)

        // Logo
        if ($request->hasFile('logo')) {
            if ($hospital->logo_path) {
                Storage::disk('public')->delete($hospital->logo_path);
            }
            $ext = $request->file('logo')->extension();
            $filename = "{$uuid}.{$ext}";
            $request->file('logo')->storeAs('logos', $filename, 'public');
            $data['logo_path'] = "logos/{$filename}";
        }

        // Icon
        if ($request->hasFile('icon')) {
            if ($hospital->icon_path) { // aquí corregido, antes borrabas logo_path
                Storage::disk('public')->delete($hospital->icon_path);
            }
            $ext = $request->file('icon')->extension();
            $filename = "{$uuid}.{$ext}";
            $request->file('icon')->storeAs('icons', $filename, 'public');
            $data['icon_path'] = "icons/{$filename}";
        }
        $hospital->update($data);

        return redirect()->route('hospitales.show')
            ->with('success', 'Hospital actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital)
    {
        if ($hospital->logo_path) {
            Storage::disk('public')->delete($hospital->logo_path);
        }
        if ($hospital->icon_path) {
            Storage::disk('public')->delete($hospital->icon_path);
        }

        $hospital->delete();

        return redirect()->route('hospitales.index')
            ->with('success', 'Hospital eliminado.');
    }
}
