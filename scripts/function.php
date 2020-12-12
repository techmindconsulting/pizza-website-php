<?php 

function getProductTypes()
{
    global $connexion;

    $statement = $connexion->prepare('SELECT * FROM product_type');
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    
    return $statement->fetchAll();
}


function hasValidEmail($email) 
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
      } else {
        return false;
      }
}

function isValidForm($postDatas)
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

function sendEmail($firstname, $lastname, $email, $phone, $message)
{
    include '../config/parameters.php';
    $fullname = $firstname. ' '. $lastname;
    $message = filter_var($message, FILTER_SANITIZE_STRING);
    $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);

    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:'.$fullname.'<'.$email.'>' . "\n";
    $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';
  
    if (mail(CONTACT_EMAIL, "Contact - pizzabilly.com", $fullname, $header)) {
        return true;
    } else {
        return false;
    }
}

?>