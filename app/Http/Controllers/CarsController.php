<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CarRepository;
use App\Http\Requests\CarFormRequest;
use Illuminate\Http\Request;

class CarsController extends Controller
{   
    public function __construct(private CarRepository $repository)
    {

    }
    public function create($trip_id)
    {
        $trip = $this->repository->create($trip_id);

        return view('cars.create')
            ->with('trip', $trip);
    }

    public function store(CarFormRequest $repository, $trip_id)
    {
        $car = $this->repository->store($repository, $trip_id);

        $car->model = strtoupper($car->model);
        $car->brand = strtoupper($car->brand);

        return to_route('trips.index')
            ->with('success', "Car {$car->brand} - {$car->model} added successfully!");
    }
}
