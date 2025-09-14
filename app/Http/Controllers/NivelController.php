<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveles  = Nivel::where('status', true)->latest()->get();
        return view('niveles.index', compact('niveles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('niveles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required','string','max:100']
        ]);
        Nivel::create($data);
        return redirect()->route('niveles.index')
            ->with('success','Nivel creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nivel $niveles)
    {
        return view('niveles.show', ['nivel' => $niveles]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nivel $nivel)
    {
        return view('niveles.edit', ['nivel' => $nivel]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nivel $nivel)
    {
        $data = $request->validate([
            'name'        => ['required','string','max:100'],
            'status'      => ['required','boolean'],
        ]);

        $nivel->update($data);

        return redirect()->route('niveles.index')
            ->with('success','Nivel actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nivel $nivel)
    {
        $nivel->status = false;
        $nivel->save();
        return redirect()->route('niveles.index')
            ->with('success', 'Nivel desactivado.');
    }
}
