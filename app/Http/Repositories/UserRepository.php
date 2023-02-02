<?php

namespace App\Repositories;

use App\Http\Requests\SignUpFormRequest;
use App\Models\User;


interface UserRepository
{
  public function create( SignUpFormRequest $request): User;
}