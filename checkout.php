<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include 'src/template/shared/head.php'; ?>
    </head>
    <body>
    <header id="header" class="header">
        <?php 
        $currentPage = 'contact'; 
        include 'src/template/shared/menu.php'; ?>
    </header>
    <?php 
        include 'src/template/section/form_checkout.php';
    ?>
    <?php include 'src/template/shared/footer.php'; ?>
    <?php include 'src/template/shared/button_whatsapp.php'; ?>
     <?php echo $scriptJavascript; ?>
    </body>
</html>