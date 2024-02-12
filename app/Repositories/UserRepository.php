<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function createUser(string $name)
    {
        $user = new User();
        $user->fill(['name' => $name])->save();
        return $user;
    }

    public function find()
    {
        return User::all();
    }

    public function deleteUser()
    {
        User::query()->delete();

    }
}
