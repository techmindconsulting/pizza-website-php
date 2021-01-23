<?php

function login(string $email, string $password) : bool
{
    $user = getUserBy('email', $email);
    if (empty($user)) {
        return false;
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['auth']['logged'] = true;
        $_SESSION['auth']['user'] = $user;
        $now = (new \DateTime())->format('Y-m-d H:i:s');
        updateUser($user['email'], ['last_login' =>$now ]);

        return true;
    }

    return false;
}
