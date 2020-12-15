<?php 

/**
 * getProductTypes
 *
 * @return array
 */
function getProductTypes() : array
{
    global $connexion;

    $statement = $connexion->prepare('SELECT * FROM product_type');
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    
    return $statement->fetchAll();
}

/**
 * getProducts
 *
 * @param  int $productId
 * @return array
 */
function getProducts(int $productId) : array
{
    global $connexion;

    $statement = $connexion->prepare('SELECT * FROM product WHERE product_type_id = :id');
    $statement->bindParam(':id', $productId, PDO::PARAM_INT);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    
    return $statement->fetchAll();
}

/**
 * hasValidEmail
 *
 * @param  string $email
 * @return bool
 */
function hasValidEmail(string $email) : bool
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
      } else {
        return false;
      }
}

/**
 * isValidForm
 *
 * @param  array $postDatas
 * @return bool
 */
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

/**
 * sendEmail
 *
 * @param  string $firstname
 * @param  string $lastname
 * @param  string $email
 * @param  string $phone
 * @param  string $message
 * @return bool
 */
function sendEmail(string $firstname, string $lastname, string $email, string $phone, string $message) : bool
{
    include '../../config/parameters.php';
    $fullname = $firstname. ' '. $lastname;
    $message = filter_var($message, FILTER_SANITIZE_STRING);
    $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);

    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:'.$fullname.'<'.$email.'>' . "\n";
    $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';
  
    if (mail(CONTACT_EMAIL, "Contact - pizzabilly.com", $message, $header)) {
        return true;
    } else {
        return false;
    }
}

?>