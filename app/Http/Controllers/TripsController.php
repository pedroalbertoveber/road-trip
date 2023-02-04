<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\TripRepository;
use App\Http\Requests\TripFormRequest;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TripsController extends Controller
{
    public function __construct(private TripRepository $repository)
    {

    }
    public function index() 
    {
        $trips = $this->repository->index();

        return view('trips.index')->with('trips', $trips);
    }

    public function show($trip_id)
    {
        $trip = $this->repository->show($trip_id);
        return view('trips.show')
            ->with('trip', $trip);
    }

    public function create() 
    {
        return view('trips.create');
    }

    public function edit($trip_id)
    {
        $trip = $this->repository->edit($trip_id);

        return view('trips.edit')
            ->with('trip', $trip);
    }

    public function update(TripFormRequest $request)
    {
        $trip = $this->repository->update($request);
        $trip->where_to = strtoupper($trip->where_to);

        return to_route('trips.index')
            ->with("success", "Trip to {$trip->where_to} updated successfully!");
    }
    public function store(TripFormRequest $request) 
    {
        $newTrip = $this->repository->store($request);

        return to_route('trips.index')
            ->with('message', "Trip to {$newTrip->where_to} registered successfully");
    }

    public function destroy($trip_id) 
    {
        $trip = $this->repository->destroy($trip_id);
        $trip->where_to = strtoupper($trip->where_to);

        return to_route('trips.index')
            ->with('success', "Trip to {$trip->where_to} removed successfully!");
    }
}
