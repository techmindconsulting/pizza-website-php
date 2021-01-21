<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function setFlash(string $name, string $message, string $class = "alert-success") : void
{
    if (!empty($name) && !empty($message) && !empty($class)) {
        if (!empty($_SESSION['flash'][$name])) {
            unset($_SESSION['flash'][$name]);
        }

        if (!empty($_SESSION['flash'][$name . "_class"])) {
            unset($_SESSION['flash'][$name . "_class"]);
        }

        $_SESSION['flash'][$name] = $message;
        $_SESSION['flash'][$name."_class"] = 'alert ' . $class;
    }
}

function getFlash(string $name) : void
{
    if (!empty($_SESSION['flash'][$name])) {
        $className = $_SESSION['flash'][$name. '_class'];
        $message = $_SESSION['flash'][$name];

        $flashMesssage = <<<EOT
        <p id="flash-message" class="{$className}">{$message} 
            <a href="#">
                <i style="font-size:0.8rem" class="fas fa-times"></i>
            </a>
        </p>
        EOT; 

        echo $flashMesssage;
        
        unset($_SESSION['flash'][$name]);
        unset($_SESSION['flash'][$name. '_class']);
    }
}