<?php

namespace App\Http\Controllers;


use App\Events\NewUser;
use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\SignInFormRequest;
use App\Http\Requests\SignUpFormRequest;
use App\Mail\UserSignedUp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function __construct(private UserRepository $repository){

    }

    public function login() {
        return view('auth.login');
    }

    public function signIn( SignInFormRequest $request) {
        $allowed = $this->repository->signIn($request);

        if (!$allowed) {
            return redirect()->back()->withErrors(['Email not found or invalid password']);
        } 

        return to_route('trips.index')
            ->with("success", 'Welcome back!');
    }

    public function register() {
        return view('auth.register');
    }

    public function signUp(SignUpFormRequest $request) {
        $this->repository->create($request);

        NewUser::dispatch(
            $request->name,
        );

        return to_route('trips.index')
            ->with("success", "Welcome to RoadTrip!");
    }

    public function logout(){
        $this->repository->logout();

        return to_route('auth.login');
    }
}
