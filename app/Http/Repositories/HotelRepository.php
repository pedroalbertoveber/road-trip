<?php

namespace App\Http\Repositories;

use App\Http\Requests\HotelFormRequest;
use App\Models\Hotel;
use App\Models\Trip;


interface HotelRepository
{

  public function create($trip_id): Trip;

  public function edit($trip_id): Trip;

  public function store(HotelFormRequest $request, $trip_id): Hotel;

  public function update(HotelFormRequest $request): Hotel;

}