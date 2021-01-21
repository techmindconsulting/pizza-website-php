<?php

function createUser(array $data) : int 
{
    try {
        global $connexion;

        $sql = "INSERT INTO user (fullname, email, phone, password, address) VALUES 
        (:fullname, :email, :phone, :passwordHashed, :address)";
        $statement = $connexion->prepare($sql);

        $statement->bindParam(':fullname',$data['fullname']);
        $statement->bindParam(':email',$data['email']);
        $statement->bindParam(':phone',$data['phone']);
        $statement->bindParam(':passwordHashed', $data['password']);
        $statement->bindParam(':address',$data['address']);

        $statement->execute();
        return $connexion->lastInsertId();
     
    } catch(Exception $exception) {
        echo $exception->getMessage();
        die;
    }
}

function isUserEmailExists(string $email) : int
{
    try {
        global $connexion;
        $sql = "SELECT count(*) FROM user WHERE email LIKE :email";
        $statement = $connexion->prepare($sql);
    
        $statement->bindParam(':email', $email);
        $statement->execute();
        
        return (bool) $statement->fetchColumn();

    } catch(Exception $exception) {
        var_dump($exception->getMessage());
    }
}

function getUser(string $email) 
{
    global $connexion;

    $sql = "SELECT * FROM user WHERE email LIKE :email";
    $statement = $connexion->prepare($sql);

    $statement->bindParam(':email', $email);
    $statement->execute();

    return $statement->fetch();
}


function getUserId(string $email)
{
    global $connexion;

    $sql = "SELECT id FROM user WHERE email LIKE :email";
    $statement = $connexion->prepare($sql);

    $statement->bindParam(':email', $email);
    $statement->execute();

    return $statement->fetchColumn();
}

function hashPassword(string $password) : string
{
    return password_hash($password, PASSWORD_DEFAULT);
}

