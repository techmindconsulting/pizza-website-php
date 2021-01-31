<?php
    define("CONTACT_PHONE", "06 11 57 16 31");
    define("CONTACT_EMAIL", "pizza-billy@yopmail.com");
    define("CONTACT_MAIL_SUBJECT", "Message depuis le formulaire de contact");
    define("CONTACT_ADDRESS", "35 rue de la République, 13002 Marseille");
    define("CONTACT_OPENING_HOURS", ['datetime' => '16:30', 'display_as' => '16h30' ]);
    define("CONTACT_CLOSING_HOURS", ['datetime' => '22:30', 'display_as' => '22h30']);

    define("WHATSAPP_API", "https://api.whatsapp.com/send");
    define("WHATSAPP_API_PARAM_PHONE", "+33611571631");
    define("WHATSAPP_API_PARAM_MESSAGE", "Bonjour");

    define("GOOGLE_MAPS_URL", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.6983849486164!2d5.368855715447902!3d43.299637679134925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9c0c02f81d563%3A0x63f017d97d88d820!2s35%20Rue%20de%20la%20R%C3%A9publique%2C%2013002%20Marseille!5e0!3m2!1sen!2sfr!4v1612120838781!5m2!1sen!2sfr");
    define("GOOGLE_MAPS_WIDTH", 600);
    define("GOOGLE_MAPS_HEIGHT", 450);
    
    define("DATABASE_USER", "root");
    define("DATABASE_PASSWORD", "");
    define("DATABASE_URL","mysql:host=127.0.0.1:3306;dbname=pizza_website;charset=utf8");

    define('MAIL_SUBJECT', '[PIZZA FOOD] ');
    define('MAIL_USER', '');
    define('MAIL_PASSWORD', '');

    define('ADMIN_EMAIL', 'saidi@yopmail.com');
    define('ADMIN_NAME', 'saidi');

    define("MAINTENANCE_MODE", false);

    define("PAYMENT_STATUS_PENDING", 'PAYMENT_STATUS_PENDING');
    define("PAYMENT_STATUS_PAID", 'PAYMENT_STATUS_PAID');
    define("PAYMENT_STATUS_CANCELLED", 'PAYMENT_STATUS_CANCELLED');

    define ("URL_RESET_PASSWORD", "http://pizza-website-php.local/reset_password.php");
    