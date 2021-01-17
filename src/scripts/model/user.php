<?php

function createUser(array $data) : int 
{
    try {
        global $connexion;

        $sql = "INSERT INTO user (fullname, email, phone, password, address) VALUES 
        (:fullname, :email, :phone, :passwordHashed, :address)";
        $statement = $connexion->prepare($sql);
        $hashed = password_hash($data['password'], PASSWORD_DEFAULT);

        $statement->bindParam(':fullname',$data['fullname']);
        $statement->bindParam(':email',$data['email']);
        $statement->bindParam(':phone',$data['phone']);
        $statement->bindParam(':passwordHashed', $hashed);
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
        $sql = "SELECT count(*) FROM user WHERE email like :email";
        $statement = $connexion->prepare($sql);
    
        $statement->bindParam(':email', $email);
        $statement->execute();
        
        return (bool) $statement->fetchColumn();

    } catch(Exception $exception) {
        var_dump($exception->getMessage());
    }
}

