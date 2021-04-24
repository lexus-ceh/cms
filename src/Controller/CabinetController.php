<?php

namespace App\Controller;

use App\Model\User;

class CabinetController
{
    public function profile()
    {
        if (isLogined()) {
            $user = User::find($_SESSION['id']);
            return view('lk.profile', $user);
        }
        header('Location: /auth/login');
    }
}