<?php


namespace Config;

//SMTP Config
define('SMTP_NOT_CONFIGURED',false);

//form newsletter
define('SMTP_NEWSLETTER_HOST','host');
define('SMTP_NEWSLETTER_FROM','no-reply@maxkod.pl');
define('SMTP_NEWSLETTER_USER','kontakt@maxkod.pl');
define('SMTP_NEWSLETTER_PASSWORD','password');
define('SMTP_NEWSLETTER_PORT',587);




class SmtpConfig
{

    const SmtpNotConfigured = false;
}


?>