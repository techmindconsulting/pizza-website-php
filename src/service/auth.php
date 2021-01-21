<?php

function login(string $email, string $password) : bool
{
    $user = getUser($email);
    if (empty($user)) {
        return false;
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['auth']['logged'] = true;
        $_SESSION['auth']['user'] = $user;

        return true;
    }

    return false;
}