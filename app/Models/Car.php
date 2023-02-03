<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'fuel_economy',
        'trip_id',
        'model_year',
    ];

    public function cars() {
        return $this->belongsTo(Trip::class, 'trip_id');
    }
}
