<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Hospital;
use App\Models\HospitalFloor;
class Nivel extends Model
{
    protected $table = 'nivels';

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'status'];
    protected $casts = [
        'status' => 'boolean',
    ];
    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class, 'hospital_floors', 'nivel_id', 'hospital_id')
            ->using(HospitalFloor::class)
            ->withTimestamps();
    }
}
