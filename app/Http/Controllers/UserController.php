<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('hospital')->latest()->paginate(15);
        return view('usuarios.index', compact('users'));
    }

    public function create()
    {
        $hospitals = Hospital::orderBy('name')->get(['id','name']);
        return view('usuarios.create', compact('hospitals'));
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name'               => ['required','string','max:120'],
        'email'              => ['required','email','max:255','unique:users,email'],
        'hospital_selected'  => ['nullable','uuid','exists:hospitals,id'],
        'password'           => ['nullable','string','min:8'],
        'user'               => ['nullable','string','max:50'], // <- opcional: viene del form (readonly)
    ]);

    // 1) Base: si viene del form (JS) lo usamos; si no, lo generamos desde el nombre
    $base = $request->input('user');
    if (!$base) {
        // si tu modelo tiene estas utilidades, úsalo:
        // $base = \App\Models\User::baseUsernameFromName($data['name']);
        // si no, regla 2 letras por palabra:
        $base = strtolower(iconv('UTF-8','ASCII//TRANSLIT',$data['name']));
        $parts = preg_split('/\s+/', trim($base));
        $base = collect($parts)
            ->filter(fn($p) => $p !== '')
            ->map(fn($p) => substr(preg_replace('/[^a-z0-9]/','',$p), 0, 2))
            ->implode('');
        if ($base === '') $base = 'user';
    }

    // 2) Colisión en servidor (base, base1, base2, ...)
    $data['user'] = \App\Models\User::generateUniqueUsername($base);

    // 3) Password opcional (si usas cast 'hashed', no necesitas Hash::make)
    $data['password'] = $data['password'] ?? \Illuminate\Support\Str::random(12);

    \App\Models\User::create($data);

    return redirect()->route('usuarios.index')->with('success','Usuario creado.');
}

    public function show(User $usuario)
    {
        $usuario->load('hospital');
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(User $usuario)
    {
        $hospitals = Hospital::orderBy('name')->get(['id','name']);
        return view('usuarios.edit', compact('usuario','hospitals'));
    }

    public function update(Request $request, User $usuario)
    {
        // 1) Si password viene vacío, lo removemos del Request
        if ($request->input('password') === null || $request->input('password') === '') {
            $request->request->remove('password');
        }

        // 2) Validamos (password solo si viene)
        $data = $request->validate([
            'name'               => ['required','string','max:120'],
            'user'               => ['required','string','max:50','unique:users,user,'.$usuario->id],
            'email'              => ['required','email','max:255','unique:users,email,'.$usuario->id],
            'email_verified_at'  => ['nullable','date'],
            'hospital_selected'  => ['nullable','uuid','exists:hospitals,id'],
            'password'           => ['sometimes','string','min:8'], // <-- solo si viene
        ]);

        // 3) Normaliza email_verified_at (si decides permitirlo en create; en edit no lo muestras)
        if (array_key_exists('email_verified_at', $data) && $data['email_verified_at'] !== null && $data['email_verified_at'] !== '') {
            $data['email_verified_at'] = \Carbon\Carbon::parse($data['email_verified_at']);
        } else {
            // si no viene en el form de edit, no lo toques
            unset($data['email_verified_at']);
        }

        // 4) Gracias al cast 'hashed' del modelo, si viene password se hashea solo; si no vino, no se toca
        $usuario->fill($data)->save();

        // 5) Volver al índice como pediste
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado.');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado.');
    }
}
