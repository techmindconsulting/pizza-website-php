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
    $postDatas = array_map('cleanFormData', $postDatas);
    
    if (empty($postDatas)) {
        return false;
    }

    foreach ($postDatas as $key => $value) {
        if (empty($value)) {
            return false;
        }
    }

    if (!hasValidToken($postDatas['form-name'])) {
        setFlash('csrf_token', 'Jeton CSRF non valide ou manquant', 'alert-error');
        header('Location:'.$_SERVER['HTTP_REFERER']);
        die;
    }

    return true;
}

function cleanFormData($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}