<?php

namespace App\Http\Repositories;

use App\Http\Repositories\UserRepository;
use App\Http\Requests\SignUpFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

      return $user;
    });
  }
}