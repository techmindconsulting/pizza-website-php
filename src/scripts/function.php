<?php 

function getProductTypes() : array
{
    global $connexion;

    $statement = $connexion->prepare('SELECT * FROM product_type');
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    
    return $statement->fetchAll();
}

function getProducts(int $productId) : array
{
    global $connexion;

    $statement = $connexion->prepare('SELECT * FROM product WHERE product_type_id = :id');
    $statement->bindParam(':id', $productId, PDO::PARAM_INT);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    
    return $statement->fetchAll();
}

function getProductTypeDescription(int $productTypeId) : string 
{
    global $connexion;
    $statement = $connexion->prepare('SELECT description FROM product_type where id = :id');
    $statement->bindParam(':id', $productTypeId, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch();
  
    return $result['description'];
}

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