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
        include 'src/includes/section/form_checkout.php';
    ?>
    <?php include 'src/includes/shared/footer.php'; ?>
    <?php include 'src/includes/shared/button_whatsapp.php'; ?>
     <?php echo $scriptJavascript; ?>
    </body>
</html>