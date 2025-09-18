<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Str;

class HospitalFloor extends Model
{
    protected $table = 'hospital_floors';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id', 'hospital_id', 'nivel_id'];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function services()
    {
        return $this->belongsToMany(HospitalService::class, 'hospital_floor_services', 'hospital_floor_id', 'hospital_service_id')
            ->withTimestamps();
    }
}
