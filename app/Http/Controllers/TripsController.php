<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    public function index() {
        return view('trips.index');
    }

    public function create() {
        return view('trips.create');
    }
}
