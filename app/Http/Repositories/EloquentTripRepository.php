<?php

namespace App\Http\Repositories;

use App\Http\Requests\TripFormRequest;
use App\Models\Trip;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EloquentTripRepository implements TripRepository {
  public function store(TripFormRequest $request): Trip 
  {
    return DB::transaction(function () use ($request) {
      $data = $request->except(['_token']);

      // transforming data to lowercase
      $data['where_from'] = strtolower($data['where_from']);
      $data['where_to'] = strtolower($data['where_to']);

      // retriving days_qty trought dates informed
      $startDate = new \DateTime($data['start_date']);
      $endDate = new \DateTime($data['end_date']);

      $interval = $startDate->diff($endDate);
      $daysQty = $interval->format('%a');

      $newTrip = Trip::create([
        'where_from' => $data['where_from'],
        'where_to' => $data['where_to'],
        'distance' => $data['distance'],
        'start_date' => $data['start_date'],
        'end_date' => $data['end_date'],
        'days_qty' => $daysQty,
        'user_id' => Auth::user()->id,
      ]);

      return $newTrip;
    });
  }
}