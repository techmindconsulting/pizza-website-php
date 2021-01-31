<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php 
            include 'src/template/shared/head.php'; 
            if (!isset($_SESSION['auth'])) {
                setFlash('login', 'Merci de vous connecter', 'alert alert-error');
                header('Location: login.php');
            }

            $statOrder = getOrderByUser($_SESSION['auth']['user']['id']);
        ?>
    </head>
    <body>
        <header id="header" class="header">
            <?php 
                $currentPage = 'account'; 
                include 'src/template/shared/menu.php'; 
            ?>
        </header>
        <section class="account wrapper background-grey">
            <div class="container text-left">
                <a href="login.php"><i class="fas fa-sign-out-alt"></i></a>
                <h2>Mon compte </h2>
                <?php 
                    getFlash('login');
                    getFlash('status_order');
                    include 'src/template/section/account.php'; 
                ?>
                <a href="carte.php" class="black-button" style="width:auto">Nouvelle commande</a>
                <?php include 'src/template/section/table_orders.php'; ?>
            </div>
        </section>
        <?php include 'src/template/shared/footer.php'; ?>
    </body>
</html>