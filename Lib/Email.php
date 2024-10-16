<?php

namespace Lib;

use \PHPMailer;
use Config\SmtpConfig;

class Email {

    public function __construct($host = SmtpConfig::SmtpHost,
            $port = SmtpConfig::SmtpPort,
            $user = SmtpConfig::SmtpUser,
            $password = SmtpConfig::SmtpPassword) {
        $this->Mail = new PHPMailer;
        $this->Mail->Host = $host;
        $this->Mail->Port = $port;
        $this->Mail->Username = $user;
        $this->Mail->Password = $password;
    }

    public function SendActivationLink($to, $key) {
        $msg = "<a href=" . ACTIVATION_LINK_URL . "$key>Confirm Your Email</a>";
        $this->Send(SmtpConfig::SmtpFrom, $to, "activation link", $msg);
    }

    public function Send($from, $to, $subject, $message) {


        $this->Mail->CharSet = 'UTF-8';
        $this->Mail->isSMTP();                                        // Set mailer to use SMTP
        $this->Mail->SMTPAuth = true;                                 // Enable SMTP authentication
        $this->Mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted

        $this->Mail->SMTPOptions = array
            (
            'ssl' => array
                (
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $this->Mail->setFrom($from, '');
        $this->Mail->addAddress($to);                                 // Add a recipient

        $this->Mail->isHTML(true);                                    // Set email format to HTML

        $this->Mail->Subject = $subject;
        $this->Mail->Body = $message;


        if ($this->Mail->send()) {
            //echo 'Message has been sent';
            return true;
        } else {

            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $this->Mail->ErrorInfo;
            $this->LastError = $this->Mail->ErrorInfo;
            return false;
        }
    }

}
