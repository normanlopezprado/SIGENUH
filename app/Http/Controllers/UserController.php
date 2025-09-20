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
            'user'               => ['nullable','string','max:50'],
            'avatar'             => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
        ]);

        // base para username (según lo ya implementado en tu proyecto)
        $base = $request->input('user') ?: \App\Models\User::baseUsernameFromName($data['name']);
        $data['user'] = \App\Models\User::generateUniqueUsername($base);
        $data['password'] = $data['password'] ?? \Illuminate\Support\Str::random(12);

        // 1) creamos sin avatar para obtener el ID
        $uuid = (string) Str::uuid();
        $data['id'] = $uuid;
        if ($request->hasFile('avatar')) {
            $ext = $request->file('avatar')->extension();
            $filename = "{$uuid}.{$ext}";
            $request->file('avatar')->storeAs('avatars', $filename, 'public');
            $data['avatar'] = "avatars/{$filename}";
        }

        $user = \App\Models\User::create($data);
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
        if ($request->filled('password') === false) {
            $request->request->remove('password');
        }

        $data = $request->validate([
            'name'               => ['required','string','max:120'],
            'user'               => ['required','string','max:50','unique:users,user,'.$usuario->id],
            'email'              => ['required','email','max:255','unique:users,email,'.$usuario->id],
            'email_verified_at'  => ['nullable','date'],
            'hospital_selected'  => ['nullable','uuid','exists:hospitals,id'],
            'password'           => ['sometimes','string','min:8'],
            'avatar'             => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
        ]);

        if (empty($data['email_verified_at'])) unset($data['email_verified_at']);

        // avatar nuevo
        if ($request->hasFile('avatar')) {
            if ($usuario->avatar) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($usuario->avatar);
            }
            $ext = $request->file('avatar')->extension();
            $filename = "{$usuario->id}.{$ext}";
            $request->file('avatar')->storeAs('avatars', $filename, 'public');
            $data['avatar'] = "avatars/{$filename}";
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success','Usuario actualizado.');
    }


    public function destroy(User $usuario)
    {
        if ($usuario->avatar) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($usuario->avatar);
        }
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado.');
    }

}
