<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'user',
        'email',
        'email_verified_at',
        'hospital_selected',
        'password',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        // Si quieres hash automático al asignar:
        'password' => 'hashed',
    ];

    public function hospital()
    {
        return $this->belongsTo(\App\Models\Hospital::class, 'hospital_selected');
    }

    /**
     * Genera el "base username" siguiendo tu regla:
     * - Dos primeras letras de cada nombre (todas las palabras excepto los dos últimos apellidos)
     * - Del penúltimo apellido: 1 letra
     * - Del último apellido: 2 letras
     * - Minúsculas, sin acentos/espacios.
     */
    public static function baseUsernameFromName(string $fullName): string
    {
        $fullName = trim($fullName);
        if ($fullName === '') return '';

        // Normaliza (sin acentos) y separa
        $parts = array_values(array_filter(preg_split('/\s+/', Str::of($fullName)->squish())));
        $asciiParts = array_map(fn($w) => strtolower(Str::of(Str::ascii($w))->replaceMatches('/[^a-z0-9]/', '')), $parts);
        $asciiParts = array_values(array_filter($asciiParts)); // limpia vacíos

        if (empty($asciiParts)) return '';

        $n = count($asciiParts);

        // Caso con un solo token: usa hasta 4 letras
        if ($n === 1) {
            return substr($asciiParts[0], 0, 4);
        }

        // Regla general (>=2): últimos 2 son apellidos si existen
        $base = '';

        // Si hay al menos 3 tokens, tratamos los primeros n-2 como nombres
        $hasta = max(0, $n - 2);
        for ($i = 0; $i < $hasta; $i++) {
            $base .= substr($asciiParts[$i], 0, 2);
        }

        // Penúltimo apellido (si existe): 1 letra
        if ($n >= 2) {
            $base .= substr($asciiParts[$n - 2], 0, 1);
        }

        // Último apellido: 2 letras
        $base .= substr($asciiParts[$n - 1], 0, 2);

        return $base;
    }

    /**
     * Genera un username ÚNICO en la tabla `users` a partir del nombre completo.
     * Aplica colisión: base, base1, base2, ...
     */
    public static function generateUniqueUsername(string $fullName): string
    {
        $base = self::baseUsernameFromName($fullName);
        if ($base === '') {
            $base = 'user';
        }

        $username = $base;
        $i = 1;

        while (self::where('user', $username)->exists()) {
            $username = $base . $i;
            $i++;
        }

        return $username;
    }
}
