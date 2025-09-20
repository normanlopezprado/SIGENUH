<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Str;

class HospitalFloorService extends Pivot
{
    protected $table = 'hospital_floor_services';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'hospital_floor_id',
        'service_id'
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    // Relaciones
    public function hospitalFloor()
    {
        return $this->belongsTo(HospitalFloor::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
