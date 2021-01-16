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

function getProduct(int $productId) : ?array
{
    global $connexion;

    $statement = $connexion->prepare('SELECT * FROM product WHERE id = :id');
    $statement->bindParam(':id', $productId, PDO::PARAM_INT);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    
    return $statement->fetch();
}

function getProductType(int $productTypeId, string $columnn = 'type') : string 
{
    global $connexion;
    $statement = $connexion->prepare('SELECT '. $columnn .' FROM product_type where id = :id');
    $statement->bindParam(':id', $productTypeId, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch();
  
    return $result[$columnn];
}
