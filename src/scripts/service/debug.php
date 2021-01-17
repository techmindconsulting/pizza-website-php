<?php

function dump($value) : void
{
    var_dump($value);
}

function dd($value) : void 
{
    var_dump($value);
    die;
}

function showSession(bool $die = false) : void 
{
    var_dump($_SESSION);
    if ($die) {
        die;
    }
}