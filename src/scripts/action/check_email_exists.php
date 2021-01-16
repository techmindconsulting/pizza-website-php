<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../../../boostrap.php';

$email = $_GET['email'] ?? $_GET['email'];
$isExists = ['exists' => false, 'email' => $email];
$userEmail = isUserEmailExists($_GET['email']);
if (!empty($userEmail)) {
    $isExists = ['exists' => true, 'email' => $email];
}

echo json_encode($isExists);

