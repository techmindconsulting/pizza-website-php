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
    href="carte.php">Commander</a>
</div>