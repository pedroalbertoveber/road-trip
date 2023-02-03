<?php

namespace App\Http\Repositories;

use App\Http\Requests\CarFormRequest;
use App\Models\Car;
use App\Models\Trip;


interface CarRepository
{

  public function create($trip_id): Trip;
  public function store(CarFormRequest $request, $trip_id): Car;

  public function edit($trip_id): Trip;

  public function update(CarFormRequest $request): Car;

}