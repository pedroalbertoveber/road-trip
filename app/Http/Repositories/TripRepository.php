<?php

namespace App\Http\Repositories;

use App\Http\Requests\TripFormRequest;
use App\Models\Trip;


interface TripRepository
{
  public function store(TripFormRequest $request): Trip;

  public function index();

  public function show($trip_id): Trip;

  public function edit($trip_id): Trip;

  public function update(TripFormRequest $request): Trip;

  public function destroy($trip_id): Trip;

}