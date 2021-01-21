<?php

function generateCsrfToken(string $formId) : string
{
    if (empty($_SESSION[$formId.'_token'])) {
        $_SESSION[$formId. '_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION[$formId.'_token'];
}

function hasValidToken(string $formId) : bool
{
    if (!isset($_SESSION[$formId.'_token']) || 
        (!isset($_POST['token'])) || 
        $_SESSION[$formId.'_token'] !== $_POST['token']) {
        
            return false;
    }

    return true;
}