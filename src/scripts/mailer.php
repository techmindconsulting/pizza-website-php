<?php 

/**
 * Build mail header
 *
 * @param  string $fullname
 * @param  string $email
 * @return void
 */
function buildMailHeader(string $fullname, string $email) : string
{
    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:'.$fullname.'<'.$email.'>' . "\n";
    $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';

    return $header;
}

/**
 * Send mail
 *
 * @param  string $to
 * @param  string $subject
 * @param  string $message
 * @param  string $header
 * @return bool
 */
function sendMail(string $to, string $subject, string $message, string $header): bool
{
    if (mail(CONTACT_EMAIL, CONTACT_MAIL_SUBJECT, $message, $header)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Send mail from contact form
 *
 * @param  string $firstname
 * @param  string $lastname
 * @param  string $email
 * @param  string $phone
 * @param  string $message
 * @return bool
 */
function sendContactMail(string $firstname, 
                string $lastname, 
                string $email, 
                string $phone, 
                string $message) : bool
{
    include '../../config/parameters.php';
    $fullname = $firstname. ' '. $lastname;
    $message = filter_var($message, FILTER_SANITIZE_STRING);
    $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);

    $header = buildMailHeader($fullname, $email);

    sendMail(CONTACT_EMAIL,CONTACT_MAIL_SUBJECT,$message,$header);
}
