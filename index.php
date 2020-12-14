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
            ?>
            <div class="banner">
                <h2>Pizza Billy</h2>
                <address><a href="tel:<?= WHATSAPP_API_PARAM_PHONE ?>"> <?= CONTACT_PHONE;  ?> </a></address>
                <p class="info">A emporter ou livraison</p>
                <p class="info">Pizzeria, ouvert de 
                    <time datetime="<?= CONTACT_OPENING_HOURS['datetime'] ?>"><?= CONTACT_OPENING_HOURS['display_as'] ?></time> à 
                    <time datetime="<?= CONTACT_CLOSING_HOURS['datetime'] ?>"><?= CONTACT_CLOSING_HOURS['display_as'] ?></time>
                </p>
                <p class="info"></p>    
                <a class="red-button" 
                href="<?= WHATSAPP_API . '?phone='. WHATSAPP_API_PARAM_PHONE . '&text='. WHATSAPP_API_PARAM_MESSAGE ?>">Commander</a>
            </div>
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