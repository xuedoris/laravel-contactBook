<?php

namespace App\Libs\Repositories;

interface UserInterface {
    public function all();

    public function find($id);

    public function create($input);
}