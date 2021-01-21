<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php 
            include 'src/includes/shared/head.php'; 
            $statOrder = getOrderByUser($_SESSION['auth']['user']['id']);
        ?>
    </head>
    <body>
    <header id="header" class="header">
    <?php 
        $currentPage = 'account'; 
        include 'src/includes/shared/menu.php'; ?>
    </header>
    <section class="account wrapper background-grey">
        <div class="container text-left">
            <p class="logout">
                <a href="login.php" class="red-button small-button"><i class="fas fa-sign-out-alt"></i></a>
            </p>
            <h2>Mon compte</h2>
            <?php 
                getFlash('login');
            ?>
            
            <?php include 'src/includes/section/account.php'; ?>
            <?php include 'src/includes/section/table_orders.php'; ?>
        </div>
    </section>
    <?php include 'src/includes/shared/footer.php'; ?>
    <?php include 'src/includes/shared/button_whatsapp.php'; ?>

</html>