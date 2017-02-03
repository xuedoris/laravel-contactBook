<?php

namespace App\Libs\Repositories;

use App\User;

class EloquentUser implements UserInterface {

    public function all()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function create($input)
    {
        return User::create($input);
    }

}