<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $dates = ['start_date', 'end_date'];


}
