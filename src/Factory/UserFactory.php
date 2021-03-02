<?php

namespace App\Factory;

use App\Exception\RegistrationValidationException;
use App\Model\Roles_user;
use App\Model\User;

class UserFactory implements Factory
{
    public static function create($data)
    {
        // TODO: Implement create() method.
        $name = $data[0];
        $email= $data[1];
        $password = $data[2];

        $user = User::firstOrNew(
            ['email' => $email],
            ['name' => $name, 'password' => $password]);

        if (isset($user->id)) {
            throw new RegistrationValidationException('email');
        }

        $user->save();

        $rolesUsers = new Roles_user();
        $rolesUsers->users_id = $user->id;
        $rolesUsers->roles_id = 3;
        $rolesUsers->save();

        return $user;
    }
}