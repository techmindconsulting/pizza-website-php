<?php 

function hasValidEmail(string $email) : bool
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function isValidForm(array $postDatas) : bool
{
    if (empty($postDatas)) {
        return false;
    }

    foreach ($postDatas as $key => $value) {
        if (empty($value)) {
            return false;
        }
    }

    return true;
}