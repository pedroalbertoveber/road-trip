<?php

namespace App\Providers;

use App\Http\Repositories\CarRepository;
use App\Http\Repositories\EloquentCarRepository;
use Illuminate\Support\ServiceProvider;

class CarRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        CarRepository::class => EloquentCarRepository::class,
    ];
}
