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

function updateUser(string $email, array $criteria)
{
    global $connexion;

    $columns = "";
    $inputParameters[':email'] = $email;
    
    foreach($criteria as $column => $value) {
        $columns .= "{$column} = :{$column}, ";
        $inputParameters[":{$column}"] = $value;
    }

    if (array_key_exists(':confirmation_token', $inputParameters)) {
        $columns .= "password_requested_at = :password_requested_at"; 
        $inputParameters[':password_requested_at'] = (new DateTime())->format('Y-m-d H:i:s');
    }

    $columns = rtrim($columns, ", ");

    $sql = "UPDATE `user` SET {$columns} where email = :email";
    $statement = $connexion->prepare($sql);

    $statement->execute($inputParameters);

    return getUserBy('email', $email);
}

function removeConfirmationToken(string $email) : void
{
    try {
        global $connexion;

        $sql = "UPDATE user SET confirmation_token = null, password_requested_at = null WHERE email like :email";
        $statement = $connexion->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
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

function getUserBy(string $column, string $value) 
{
    global $connexion;

    $sql = "SELECT * FROM user WHERE {$column} LIKE :{$column}";
    $statement = $connexion->prepare($sql);

    $statement->bindParam(":{$column}", $value);
    $statement->setFetchMode(PDO::FETCH_ASSOC);
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

