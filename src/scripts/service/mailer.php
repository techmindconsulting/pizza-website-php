<?php 

function buildMailHeader(string $fullname, string $email) : string
{
    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:'.$fullname.'<'.$email.'>' . "\n";
    $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';

    return $header;
}

function sendMail(string $to, string $subject, string $message, string $header): bool
{
    if (mail($to, CONTACT_MAIL_SUBJECT, $message, $header)) {
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
    $header = buildMailHeader(ADMIN_NAME,ADMIN_EMAIL);

    return sendMail(ADMIN_EMAIL, $subject, $message,$header);
}
