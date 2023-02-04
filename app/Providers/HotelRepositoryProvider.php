<?php

namespace App\Providers;

use App\Http\Repositories\EloquentHotelRepository;
use App\Http\Repositories\HotelRepository;
use Illuminate\Support\ServiceProvider;

class HotelRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        HotelRepository::class => EloquentHotelRepository::class,
    ];
}
