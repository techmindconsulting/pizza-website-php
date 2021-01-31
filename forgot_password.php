<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
unset($_SESSION['auth']);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include 'src/template/shared/head.php'; ?>
    </head>
    <body>
        <header id="header" class="header">
            <?php 
                $currentPage = 'login'; 
                include 'src/template/shared/menu.php'; 
            ?>
        </header>
        <?php 
            include 'src/template/section/form_forgot_password.php';
            include 'src/template/shared/footer.php';
            include 'src/template/shared/button_whatsapp.php'; 
        ?>
    </body>
</html>