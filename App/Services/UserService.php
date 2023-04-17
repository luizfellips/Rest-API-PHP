<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function get($id = null)
    {
        if ($id) {
            return User::select($id);
        } else {
            return User::selectAll();
        }
    }

    public function post()
    {
        return User::insert($_POST);
    }

    public function put($id = null)
    {
        parse_str(file_get_contents('php://input'), $_PUT);
        return User::updateUser($id,$_PUT);
        
    }

    public function delete($id = null)
    {
        return User::delete($id);
    }
}
