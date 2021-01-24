<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
unset($_SESSION['auth']);

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php 
            include 'src/template/shared/head.php'; 
            $token = $_GET['token']?? null;

            if (!empty($token)) {
                $user = getUserBy('confirmation_token', $token);
                $email = $user['email'];
                if (empty($user)) {
                    setFlash('login', 'Token invalide', 'alert alert-error');
                    header('Location: ../../login.php');
                    die;
                }
            }
        
        ?>
    </head>
    <body>
    <header id="header" class="header">
        <?php 
        $currentPage = 'login'; 
        include 'src/template/shared/menu.php'; ?>
    </header>
    <?php 
        include 'src/template/section/form_reset_password.php';
    ?>
    <?php include 'src/template/shared/footer.php'; ?>
    <?php include 'src/template/shared/button_whatsapp.php'; ?>
</html>