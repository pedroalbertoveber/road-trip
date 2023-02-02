<?php

namespace App\Providers;

use App\Http\Repositories\EloquentTripRepository;
use App\Http\Repositories\TripRepository;
use Illuminate\Support\ServiceProvider;

class TripRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        TripRepository::class => EloquentTripRepository::class,
    ];
}
