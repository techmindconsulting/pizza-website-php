<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include 'src/template/shared/head.php'; ?>
    </head>
    <body>
        <!-- Header : Menu + baniere -->
        <header id="header" class="header">
            <?php 
                $currentPage = 'homepage';
                include 'src/template/shared/menu.php'; 
                include 'src/template/shared/banner.php'; 
            ?>
        </header>
        <?php 
            // Service
            include 'src/template/section/service.html'; 
            // Localisation
            include 'src/template/section/map.php';
            // Contact
            include 'src/template/section/form_contact.php';
            // Footer
            include 'src/template/shared/footer.php';
            include 'src/template/shared/button_whatsapp.php'; 
        ?>
    </body>
</html>