<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\SignInFormRequest;
use App\Http\Requests\SignUpFormRequest;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepository $repository){
        $this->userRepository = $repository;
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
        $this->userRepository->create($request);

        return to_route('trips.index');
    }
}
