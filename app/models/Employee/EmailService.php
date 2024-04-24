<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include the Composer autoloader

class EmailService {
    private $mailer;

    public function __construct() {
        $this->mailer = new PHPMailer(true); // Passing `true` enables exceptions
    }
    public function sendRegistrationEmail($recipient, $username, $password) {
        try {
            //Server settings
            $this->mailer->isSMTP();
            $this->mailer->Host       = 'sandbox.smtp.mailtrap.io';
            $this->mailer->SMTPAuth   = true;
            $this->mailer->Port       = 2525; // Mailtrap port
            $this->mailer->Username   = '2eb1967535ee8a'; // Mailtrap username
            $this->mailer->Password   = '3fc23bf0e5c7f5';   // Mailtrap password
            $this->mailer->SMTPSecure = 'tls';
    
            // Enable debugging
            $this->mailer->SMTPDebug = 2;
    
            //Recipients
            $this->mailer->setFrom('info@slrail.lk', 'SLRail');
            $this->mailer->addAddress($recipient);
    
            //Content
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Registration Details';
            $this->mailer->Body    = 'Username: ' . $username . '<br>Password: ' . $password;
    
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            // Print error message
            echo 'Message could not be sent. Mailer Error: ', $this->mailer->ErrorInfo;
            return false;
        }
    }
}

?>
