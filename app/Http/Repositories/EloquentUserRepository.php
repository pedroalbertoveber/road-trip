<?php

namespace App\Http\Repositories;

use App\Http\Repositories\UserRepository;
use App\Http\Requests\SignInFormRequest;
use App\Http\Requests\SignUpFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EloquentUserRepository implements UserRepository {

  public function create(SignUpFormRequest $request): User
  {
    return DB::transaction(function () use ($request) {
      $data = $request->except(['_token']);

      // transforming all data retrived to lowercase
      $data['name'] = strtolower($data['name']);
      $data['email'] = strtolower($data['email']);

      // hashing password
      $data['password'] = Hash::make($data['password']);

      // creating user in DB
      $user = User::create($data);
      Auth::login($user);

      return $user;
    });
  }

  public function signIn (SignInFormRequest $request): bool
  {
    $allowed = false;
    $data = $request->only(['email', 'password']);

    // transforming email address to lowercase
    $data['email'] = strtolower($data['email']);

    if (!Auth::attempt($data)) {
      $allowed = false;
    } else {
      $allowed = true;
    }

    return $allowed;
  }

  public function logout():void
  {
    Auth::logout();
  }
}