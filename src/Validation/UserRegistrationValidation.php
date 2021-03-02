<?php


namespace App\Validation;


use App\Exception\RegistrationValidationException;
use App\Factory\UserFactory;
use App\Model\User;

class UserRegistrationValidation implements Validatable
{
    public function isValidated(): bool
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = (!empty($_POST['password']) && !empty($_POST['password-conf']) && $_POST['password'] === $_POST['password-conf']) ? $_POST['password'] : '';

        if (empty($name)) {
            throw new RegistrationValidationException('name');
        }

        if (empty($email)) {
            throw new RegistrationValidationException('email');
        }

        if (empty($password)) {
            throw new RegistrationValidationException('password');
        }

        $user = UserFactory::create([$name, $email, $password]);

        $_SESSION['id'] = $user->id;
        $_SESSION['name'] = $user->name;
        $_SESSION['email'] = $user->email;

        return true;
    }
}