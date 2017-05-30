<?php
/**
 * Created by PhpStorm.
 * User: DARA123
 * Date: 2/4/2017
 * Time: 3:09 PM
 */

namespace App\Libs\Repositories;


class UserTest implements UserInterface
{
    public function all()
    {

    }

    public function find($id)
    {

    }

    public function getTopContacts($id, $type, $number)
    {
        return [
            'user' => 1,
        ];
    }

    public function create($input)
    {

    }
}