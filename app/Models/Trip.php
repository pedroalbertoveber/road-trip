<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Car;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'where_from', 
        'where_to', 
        'distance', 
        'start_date', 
        'end_date', 
        'days_qty', 
        'travellers',
        'user_id',
        'image_path',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cars() {
        return $this->hasOne(Car::class, 'trip_id');
    }

    public function hotels() {
        return $this->hasOne(Hotel::class, 'trip_id');
    }

    protected $dates = ['start_date', 'end_date'];


}
