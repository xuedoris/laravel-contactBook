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

    /*
     * Get Top contacts of the desired user: newest added contacts, recently viewed contacts and etc.
     * */
    public function getTopContacts($id, $type, $number)
    {
        switch ($type){
            case 'newest-added':
                return $this->find($id)->contacts()->orderBy('created_at', 'desc')->paginate($number);
                break;
            case 'recent-viewed':
                //@todo
                break;
        }
    }

    public function create($input)
    {
        return User::create($input);
    }

}