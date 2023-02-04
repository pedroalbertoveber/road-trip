<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\HotelRepository;
use App\Http\Requests\HotelFormRequest;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function __construct(private HotelRepository $repository)
    {}

    public function create($trip_id)
    {
        $trip = $this->repository->create($trip_id);

        return view('hotels.create')
            ->with('trip', $trip);
    }

    public function store(HotelFormRequest $request, $trip_id)
    {
        $hotel = $this->repository->store($request, $trip_id);
        return to_route('trips.show', $trip_id)
            ->with('success', "Hotel {strtoupper($hotel->name)} registered successfully!");
    }

    public function edit($trip_id)
    {
        $trip = $this->repository->edit($trip_id);
        return view('hotels.edit')
            ->with('trip', $trip);
    }

    public function update(HotelFormRequest $request)
    {
        $this->repository->update($request);

        return to_route('trips.index')
            ->with('success', 'Hotel updated successfully!');
    }
}
