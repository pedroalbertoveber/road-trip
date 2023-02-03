<?php

namespace App\Http\Repositories;

use App\Http\Requests\CarFormRequest;
use App\Models\Car;
use App\Models\Trip;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EloquentCarRepository implements CarRepository {

  public function create($trip_id): Trip 
  {
    $trip = Trip::where('id', $trip_id)->first();
    return $trip;
  }
  public function store(CarFormRequest $request, $trip_id): Car 
  {   
    return DB::transaction(function () use ($request, $trip_id) {
      $data = $request->except(['_token']);

      // transforming data to lowercase
      $data['brand'] = strtolower($data['brand']);
      $data['model'] = strtolower($data['model']);

      $newCar = Car::create([
        'brand' => $data['brand'],
        'model' => $data['model'],
        'fuel_economy' => $data['fuel_economy'],
        'model_year' => $data['model_year'],
        'trip_id' => Trip::find($trip_id)->id,
      ]);

      return $newCar;
    });
  }

  public function edit($trip_id):Trip
  {
    $trip = Trip::where('id', $trip_id)->with('cars')->first();
    return $trip;
  }

  public function update(CarFormRequest $request): Car
  {
    return DB::transaction(function () use ($request) {
      $data = $request->except(['_token']);

      // transforming data to lowercase
      $data['brand'] = strtolower($data['brand']);
      $data['model'] = strtolower($data['model']);

      $car = Car::where('id', $data['id'])->first();

      $car->brand = $data['brand'];
      $car->model = $data['model'];
      $car->fuel_economy = $data['fuel_economy'];
      $car->model_year = $data['model_year'];

      $car->update();

      return $car;
    });
  }
}