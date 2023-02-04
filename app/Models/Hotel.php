<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'trip_id',
    ];

    public function hotels() {
        return $this->belongsTo(Trip::class, 'hotel_id');
    }
}
