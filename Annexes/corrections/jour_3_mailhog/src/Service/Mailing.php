<?php declare(strict_types=1);

namespace App\Service;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

final class Mailing {
 
    public function sendMail(string $to, string $subject, string $message) {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->Port = $_ENV['MAIL_PORT'];

        $mail->SMTPAuth = false; 
        $mail->setFrom($to, 'Formulaire');
        $mail->addAddress('contact@societefictive.fr' );

        // Contenu du mail
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->send();
    }
}