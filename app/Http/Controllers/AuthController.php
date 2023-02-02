<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignInFormRequest;
use App\Http\Requests\SignUpFormRequest;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct(private UserRepository $repository){

    }

    public function login() {
        return view('auth.login');
    }

    public function signIn( SignInFormRequest $request) {
        return to_route('trips.index');
    }

    public function register() {
        return view('auth.register');
    }

    public function signUp(SignUpFormRequest $request) {
        $this->repository->create($request);

        return to_route('trips.index');
    }
}
