<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Nivel;
use App\Models\HospitalFloor;
class Hospital extends Model
{
    protected $fillable = [
        'id','name', 'description', 'address','email', 'phone', 'logo_path', 'icon_path', 'latitude', 'longitude',
        'status'
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) \Illuminate\Support\Str::uuid();
            }
        });
    }
    // Accesor para obtener URL pública del logo
    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo_path ? asset('storage/' . $this->logo_path) : null;
    }
    public function getIconUrlAttribute(): ?string
    {
        return $this->icon_path ? asset('storage/' . $this->icon_path) : null;
    }

    public function niveles()
    {
        return $this->belongsToMany(Nivel::class, 'hospital_floors', 'hospital_id', 'nivel_id')
            ->using(HospitalFloor::class)
            ->withTimestamps();
    }
    public function floors(): HasMany
    {
        return $this->hasMany(HospitalFloor::class, 'hospital_id');
    }
}
