<?php

namespace App\Http\Repositories;

use App\Http\Requests\SignUpFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


interface UserRepository
{
  public function create(SignUpFormRequest $request): User;
}