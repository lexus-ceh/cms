<?php


namespace App\Controller;


use App\Validation\UserAuthorizationValidation;
use App\Validation\UserRegistrationValidation;

class UserController
{
    public function login()
    {
        return view('auth.login');
    }

    public function signOut()
    {
        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        header('Location: /');
    }

    public function authLogin()
    {
        $isValidated = (new UserAuthorizationValidation())->isValidated();
        header('Location: /');
    }

    public function registration()
    {
        return view('auth.registration', ['title' => 'REGISTRATION']);
    }

    public function authRegistration()
    {
        $isValidated = (new UserRegistrationValidation())->isValidated();
        header('Location: /');
        // return view('auth.registration', ['title' => 'REGISTRATION COMPLETE']);
    }
}