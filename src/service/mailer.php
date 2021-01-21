<?php 

function buildMailHeader(string $fullname, string $email) : string
{
    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:'.$fullname.'<'.$email.'>' . "\n";
    $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';

    return $header;
}

function buildOrderMessageAdmin(array $customerData)
{
    $total = computeTotalOrder($customerData['cart_item']);

    $header = <<<EOT
            <html>
            <body>
            <h1>Commande numéro {$customerData['order_id']} de {$customerData['fullname']}</h1>
            <dl>
                <dt style="float:left;font-size:24px">Email</dt>
                <dd style="font-size:24px">{$customerData['email']}</dd>
                <dt style="float:left;font-size:24px">Téléphone</dt>
                <dd style="font-size:24px">{$customerData['phone']}</dd>
                <dt style="float:left;font-size:24px">Adresse</dt>
                <dd style="font-size:24px">{$customerData['address']}</dd>
            <dl>
            <h2>Détail de la commande</h2>
            <table style="border:1px solid black;border-collapse:collapse;border-spacing:20px">
                <tr>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Type de produit</th>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Produit</th>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Quantité</th>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Price</th>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Total</th>
                </tr>
            <tbody>
            EOT;

    $bodyLines = '';
    foreach($customerData['cart_item'] as $productId => $item) {
        $productType = getProductType($item['product_type_id']);
        $bodyLines .= "
            <tr>
                <td style='padding: 10px;font-size:24px;text-align:center'>{$productType}</td>
                <td style='padding: 10px;font-size:24px;text-align:center'>{$item['name']}</td>
                <td style='padding: 10px;font-size:24px;text-align:center'>{$item['quantity']}</td>
                <td style='padding: 10px;font-size:24px;text-align:center'>{$item['price']}€</td>
                <td style='padding: 10px;font-size:24px;text-align:center'>{$item['total']}€</td>
            </tr>
        ";
    }

    $footer = <<<EOT
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" style="text-align:right;font-size:24px;text-transform:uppercase">Total</th>
                <td style="font-size:24px;text-align:center">{$total} €</td>
            </tr>
        </tfoot>
        EOT;

    return $header . $bodyLines . $footer;
}

function buildOrderMessageCustomer(array $customerData)
{
    $total = computeTotalOrder($customerData['cart_item']);
    $address = CONTACT_ADDRESS;
    $header = <<<EOT
            <html>
            <body>
            <h1>Merci pour votre commande</h1>
            <h2>Voici votre numéro de commande : {$customerData['order_id']}</h2>
            <p style="font-size:24px">Adresse de retrait {$address}</p>
            <h2>Détail de la commande</h2>
            <table style="border:1px solid black;border-collapse:collapse;border-spacing:20px">
                <tr>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Type de produit</th>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Produit</th>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Quantité</th>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Price</th>
                    <th style="padding: 10px;font-size:24px;text-transform:uppercase;text-align:center">Total</th>
                </tr>
            <tbody>
            EOT;

    $bodyLines = '';
    foreach($customerData['cart_item'] as $productId => $item) {
        $productType = getProductType($item['product_type_id']);
        $bodyLines .= "
            <tr>
                <td style='padding: 10px;font-size:24px;text-align:center'>{$productType}</td>
                <td style='padding: 10px;font-size:24px;text-align:center'>{$item['name']}</td>
                <td style='padding: 10px;font-size:24px;text-align:center'>{$item['quantity']}</td>
                <td style='padding: 10px;font-size:24px;text-align:center'>{$item['price']}€</td>
                <td style='padding: 10px;font-size:24px;text-align:center'>{$item['total']}€</td>
            </tr>
        ";
    }

    $footer = <<<EOT
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" style="text-align:right;font-size:24px;text-transform:uppercase">Total</th>
                <td style="font-size:24px;text-align:center">{$total} €</td>
            </tr>
        </tfoot>
        EOT;

    return $header . $bodyLines . $footer;
}

function sendMail(string $to, string $subject, string $message, string $header): bool
{
    if (mail($to, MAIL_SUBJECT . $subject, $message, $header)) {
        return true;
    } else {
        return false;
    }
}

function sendContactMail(string $firstname, 
                string $lastname, 
                string $email, 
                string $phone, 
                string $message) : bool
{
    include '../../../config/parameters.php';
    $fullname = $firstname. ' '. $lastname;
    $message = filter_var($message, FILTER_SANITIZE_STRING);
    $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);

    $header = buildMailHeader($fullname, $email);

    return sendMail(CONTACT_EMAIL,CONTACT_MAIL_SUBJECT,$message,$header);
}

function sendNotification(string $subject, string $message) : bool
{
    $header = buildMailHeader(ADMIN_NAME, ADMIN_EMAIL);

    return sendMail(ADMIN_EMAIL, $subject, $message,$header);
}

function sendConfirmationOrder(array $customerData) : void
{
    $subject = PAYMENT_STATUS_PENDING. ' numéro '.$customerData['order_id'];

    $customer = $customerData['email'];

    $headerAdmin = buildMailHeader($customer, $customerData['fullname']);
    $messageAdmin = buildOrderMessageAdmin($customerData);
    sendMail(ADMIN_EMAIL, $subject, $messageAdmin, $headerAdmin);

    $headerCustomer = buildMailHeader(ADMIN_NAME, ADMIN_EMAIL);
    $messageCustomer = buildOrderMessageCustomer($customerData);
    sendMail($customerData['email'], $subject, $messageCustomer, $headerCustomer);
}

