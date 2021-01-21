<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
unset($_SESSION['auth']);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include 'src/includes/shared/head.php'; ?>
    </head>
    <body>
    <header id="header" class="header">
        <?php 
        $currentPage = 'login'; 
        include 'src/includes/shared/menu.php'; ?>
    </header>
    <?php 
        include 'src/includes/section/form_login.php';
        session_unset();
        session_destroy();
    ?>
    <?php include 'src/includes/shared/footer.php'; ?>
    <?php include 'src/includes/shared/button_whatsapp.php'; ?>
</html>