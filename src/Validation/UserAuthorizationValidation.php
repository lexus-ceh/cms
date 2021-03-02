<?php

namespace App\Validation;

use App\Exception\AuthorizationValidationException;
use App\Model\User;

class UserAuthorizationValidation implements Validatable
{
    public function isValidated(): bool
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = User::select('users.id', 'email', 'users.name as name')
            ->selectRaw('GROUP_CONCAT(roles.name) as role')
            ->leftJoin('roles_users', 'users.id', '=', 'roles_users.users_id')
            ->leftJoin('roles', 'roles.id', '=', 'roles_users.roles_id')
            ->where('email', $email)
            ->where('password', $password)
            ->groupBy('users.id')
            ->get();

        $user2 = User::where('email', $email)
            ->where('password', $password)
            ->get(['id', 'email', 'name']);

        if ($user->isEmpty()) {
            throw new AuthorizationValidationException();
        }

        $user = $user->first();

//        echo '<pre>';
//        var_dump($user->role);
//        echo '</pre>';


        $_SESSION['id'] = $user->id;
        $_SESSION['name'] = $user->name;
        $_SESSION['email'] = $user->email;
        $_SESSION['role'] = $user->role;

        return true;

    }
}