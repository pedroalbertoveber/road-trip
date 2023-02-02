<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\TripRepository;
use App\Http\Requests\TripFormRequest;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    public function __construct(private TripRepository $repository)
    {

    }
    public function index() {
        return view('trips.index');
    }

    public function create() {
        return view('trips.create');
    }

    public function store(TripFormRequest $request) {
        $newTrip = $this->repository->store($request);

        return to_route('trips.index')->with('message', "Trip to {$newTrip->where_to} registered successfully");
    }
}
