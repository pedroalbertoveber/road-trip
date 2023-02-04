<?php

namespace App\Http\Repositories;

use App\Http\Requests\CarFormRequest;
use App\Http\Requests\HotelFormRequest;
use App\Models\Hotel;
use App\Models\Trip;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EloquentHotelRepository implements HotelRepository {

  public function create($trip_id): Trip
  {
    $trip = Trip::where('id', $trip_id)->first();
    return $trip;
  }

  public function store(HotelFormRequest $request, $trip_id): Hotel
  {
    return DB::transaction(function () use ($request, $trip_id) {
      $data = $request->except(['_token']);

      // transforming name to lowercase
      $data['name'] = strtolower($data['name']);

      $hotel = Hotel::create([
        'name' => $data['name'],
        'price' => $data['price'],
        'trip_id' => $trip_id,
      ]);

      return $hotel;
      
    });
  }

  public function update(HotelFormRequest $request): Hotel
  {
    return DB::transaction(function () use ($request) {
      $data = $request->except(['_token']);
      $hotel = Hotel::where('id', $data['hotel_id'])->first();

      // transforming name to lowercase
      $data['name'] = strtolower($data['name']);

      //updating items
      $hotel->name = $data['name'];
      $hotel->price = $data['price'];

      $hotel->update();
      return $hotel;
    });
  }

  public function edit($trip_id): Trip
  {
    $trip = Trip::where('id', $trip_id)->with('hotels')->first();
    return $trip;
  }
}