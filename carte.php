<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include 'src/template/shared/head.php'; ?>
    </head>
    <body>
        <header id="header" class="header">
            <?php 
            $currentPage = 'carte'; 
            include 'src/template/shared/menu.php'; ?>
        </header>
        <?php 
            if (isset($_GET['product-type-id'])) {
                include 'src/template/section/product.php';
            } else {
                include 'src/template/section/product_type.php'; 
            }
            
            // Footer
            include 'src/template/shared/footer.php';
            include 'src/template/shared/button_whatsapp.php'; 
        ?>
    </body>
</html>