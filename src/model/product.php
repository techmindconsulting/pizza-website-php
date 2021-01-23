<?php

function getProductTypes() : array
{
    global $connexion;
    $sql = 'SELECT * FROM product_type';
    $statement = $connexion->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    
    return $statement->fetchAll();
}

function getProducts(int $productId) : array
{
    global $connexion;
    $sql = 'SELECT * FROM product WHERE product_type_id = :id';
    $statement = $connexion->prepare($sql);
    $statement->bindParam(':id', $productId, PDO::PARAM_INT);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    
    return $statement->fetchAll();
}

function getProduct(int $productId) : ?array
{
    global $connexion;
    $sql = 'SELECT * FROM product WHERE id = :id';
    $statement = $connexion->prepare($sql);
    $statement->bindParam(':id', $productId, PDO::PARAM_INT);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    
    return $statement->fetch();
}

function getProductType(int $productTypeId, string $column = 'type') : string 
{
    global $connexion;
    $sql = 'SELECT '. $column .' FROM product_type where id = :id';
    $statement = $connexion->prepare($sql);
    $statement->bindParam(':id', $productTypeId, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch();
  
    return $result[$column];
}
