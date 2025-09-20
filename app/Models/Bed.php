<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bed extends Model
{
    protected $table = 'beds';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'hospital_floor_service_id',
        'code',
        'status',
        'notes',
    ];
    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function hospitalFloorService()
    {
        return $this->belongsTo(HospitalFloorService::class);
    }
}
