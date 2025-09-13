<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalService extends Model
{
    protected $fillable = [
        'name', 'abbreviation', 'category', 'description', 'status',
    ];
}
