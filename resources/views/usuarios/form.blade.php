@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
  </div>
@endif

@php
  $isEdit = isset($usuario) && $usuario->exists;
@endphp

<div class="row g-4">
  <div class="col-12 col-lg-6">
    <div class="card h-100 mb-0">
      <div class="card-header">
        <h5 class="card-title mb-0">Usuario</h5>
      </div>

        <div class="card-body">

            {{-- Nombre --}}
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name"
                    placeholder="Nombre" value="{{ old('name', $usuario->name ?? '') }}" required>
            <label for="name">Nombre</label>
            </div>

            {{-- Usuario (autogenerado) --}}
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="user" name="user"
                    value="{{ old('user', $usuario->user ?? '') }}"
                    placeholder="Usuario sugerido">
            <label for="user">Usuario sugerido</label>
            </div>


            {{-- Email --}}
            <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email"
                    placeholder="correo@ejemplo.com"
                    value="{{ old('email', $usuario->email ?? '') }}" required>
            <label for="email">Email</label>
            </div>

            {{-- Hospital asignado --}}
            <div class="mb-3">
            <label for="hospital_selected" class="form-label">Hospital asignado</label>
            <select id="hospital_selected" name="hospital_selected" class="form-select">
                <option value="">— Ninguno —</option>
                @foreach($hospitals as $h)
                <option value="{{ $h->id }}"
                    @selected(old('hospital_selected', $usuario->hospital_selected ?? '') == $h->id)>
                    {{ $h->name }}
                </option>
                @endforeach
            </select>
            </div>

            {{-- Contraseña --}}
            <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password"
                    placeholder="••••••••" autocomplete="new-password">
            <label for="password">{{ $isEdit ? 'Nueva contraseña (opcional)' : 'Contraseña' }}</label>
            </div>

            {{-- Botones --}}
            <div class="mt-3">
            <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Actualizar' : 'Guardar' }}</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
      </div>
    </div>
  </div>
</div>
