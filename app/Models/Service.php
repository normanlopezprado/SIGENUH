<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'abbreviation', 'category', 'description',
    ];
    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
    public function hospitalFloors()
    {
        return $this->belongsToMany(
            HospitalFloor::class,
            'hospital_floor_services',
            'service_id',
            'hospital_floor_id'
        )->withTimestamps();
    }
}
