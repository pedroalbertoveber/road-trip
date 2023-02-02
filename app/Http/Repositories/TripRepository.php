<?php

namespace App\Http\Repositories;

use App\Http\Requests\TripFormRequest;
use App\Models\Trip;


interface TripRepository
{
  public function store(TripFormRequest $request): Trip;

}