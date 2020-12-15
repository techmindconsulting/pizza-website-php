<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include 'src/includes/shared/head.php'; ?>
    </head>
    <body>
    <header id="header" class="header">
        <?php 
        $currentPage = 'contact'; 
        include 'src/includes/shared/menu.php'; ?>
    </header>
    <?php 
        if (isset($_GET['product-type-id'])) {
            include 'src/includes/section/product.php';
        } else {
            include 'src/includes/section/product_type.php'; 
        }
    ?>
    <?php include 'src/includes/shared/footer.php'; ?>
    <?php include 'src/includes/shared/button_whatsapp.php'; ?>
    </body>
</html>