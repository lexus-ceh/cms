<?php

function array_get($array, $key, $default = null)
{
    $keys = explode('.', $key);
    foreach ($keys as $key) {
        $array = $array[$key] ?? $default;
    }
    return $array;
}

function view($view, $data = null)
{
    return new App\View\View($view, $data);
}

function isLogined()
{
    return isset($_SESSION['name']);
}

function isUserRole($role)
{
    if (isLogined()) {
        return strpos($_SESSION['role'], $role);
        // return $_SESSION['role'] == $role;
    }

    return false;
}

function isSubscriber()
{
    if (isLogined()) {
        return $subscriber = \App\Model\Subscriber::where('email', $_SESSION['email'])->first();
    }
    return false;
}