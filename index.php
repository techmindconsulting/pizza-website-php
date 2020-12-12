<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include 'includes/head.php'; ?>
    </head>
    <body>
        <!-- Menu + baniere -->
        <header id="header" class="header">
            <?php 
                $currentPage = 'homepage';
                include 'includes/menu.php'; 
            ?>
            <div class="banner">
                <h2>Pizza Billy</h2>
                <address><a href="tel:<?= WHATSAPP_API_PARAM_PHONE ?>"> <?= CONTACT_PHONE;  ?> </a></address>
                <p class="info">A emporter ou livraison</p>
                <p class="info">Pizzeria, ouvert de <time datetime="17:30">17h30</time> à <time datetime="22:30">22H30</time></p>
                <p class="info"></p>    
                <a class="red-button" 
                href="<?= WHATSAPP_API . '?phone='. WHATSAPP_API_PARAM_PHONE . '&text='. WHATSAPP_API_PARAM_MESSAGE ?>">Commander</a>
            </div>
        </header>
        <!-- Service -->
        <section id="service" class="wrapper service background-grey">
            <div class="container">
                <h2>Livraison à partir de 7€ sur Marseille</h2>
                <p>1<sup>er</sup> / 4<sup>eme</sup> /  5<sup>eme</sup> / 6<sup>eme</sup> / 10<sup>eme</sup> / 11<sup>eme</sup> arrondissement</p>
                <p>Moyens de paiement acceptés : chèque, espèce, ticket restaurant</p>
                <div class="cards">
                    <div class="card">
                        <i class="icon rounded background-blue fas fa-utensils"></i>
                        <h3>Formule burger + boisson 5€</h3>
                        <p class="detail">Hamburger et boisson</p>
                    </div>
                    <div class="card">
                        <i class="icon rounded background-pink fas fa-utensils"></i>
                        <h3>3 Pizzas achetées, la 4<sup>eme</sup> offerte</h3>
                        <p class="detail">Fromage ou anchois ou 1 boisson offerte</p>
                    </div>
                </div>
                <a class="red-button" href="#">Voir la carte</a>
            </div>
        </section>
        <!-- Localisation -->
        <section id="localisation" class="wrapper">
            <div class="container">
                <h2>Plan d'acces</h2>
                <p><?= CONTACT_ADDRESS ?></p>
                <p><?= CONTACT_PHONE ?></p>
                <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4990.816503056546!2d5.391916738540558!3d43.29397768091119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9c0a74135d299%3A0x83457b094bcf0c4b!2s35%20Rue%20Vitalis%2C%2013005%20Marseille!5e0!3m2!1sen!2sfr!4v1602067173306!5m2!1sen!2sfr" 
                width="600" 
                height="450"
                allowfullscreen="" 
                aria-hidden="false" 
                tabindex="0"></iframe>
            </div>
        </section>
        <section id="contact" class="wrapper contact">
            <?php include 'includes/form_contact.php' ?>
        </section>
        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/button_whatsapp.php'; ?>

    </body>
</html>