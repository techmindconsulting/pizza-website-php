<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include 'src/includes/shared/head.php'; ?>
    </head>
    <body>
        <!-- Header : Menu + baniere -->
        <header id="header" class="header">
            <?php 
                $currentPage = 'homepage';
                include 'src/includes/shared/menu.php'; 
                include 'src/includes/shared/banner.php'; 
            ?>
        </header>
        <!-- Service -->
        <?php include 'src/includes/section/service.html'; ?>
        <!-- Localisation -->
        <?php include 'src/includes/section/map.php'; ?>
        <!-- Contact -->
        <?php include 'src/includes/section/form_contact.php' ?>
        <!-- Footer -->
        <?php include 'src/includes/shared/footer.php'; ?>
        <?php include 'src/includes/shared/button_whatsapp.php'; ?>
    </body>
</html>