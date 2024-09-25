<?php
/**
 * Filename: UserRepository.php
 * Description: This Repository is used to helps the update functions for user table
 * Author: Muthu Velan
 * Date: 25-09-2024
 * Version: 1.0
 */
namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function createUser($data)
    {
        return User::create($data);
    }

    public function findUserById($id)
    {
        return User::findOrFail($id);
    }

    public function updateUser($id, $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser($id)
    {
        return User::destroy($id);
    }
}
