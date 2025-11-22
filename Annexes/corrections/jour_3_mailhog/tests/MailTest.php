<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

class MailTest extends TestCase
{
    private string $mailhogApi = "http://localhost:8025/api/v2/messages";

    /** @test */
    public function test_email_is_received_in_mailhog()
    {
        // 1. Nettoyage de MailHog avant test
        file_get_contents("http://localhost:8025/api/v1/messages"); // pour init
        file_get_contents("http://localhost:8025/api/v1/messages?delete=true");

        // 2. Envoi d’un email
        $to = "user@example.com";
        $subject = "Test MailHog";
        $message = "Hello from PHPUnit test!";
        $headers = "From: test@example.com";

        mail($to, $subject, $message, $headers);

        // 3. Attente courte (MailHog reçoit en asynchrone)
        sleep(1);

        // 4. Récupérer les messages reçus
        $json = file_get_contents($this->mailhogApi);
        $data = json_decode($json, true);

        // 5. Vérifications
        $this->assertNotEmpty($data["items"], "Aucun mail reçu par MailHog");

        $mail = $data["items"][0];

        $this->assertEquals($subject, $mail["Content"]["Headers"]["Subject"][0]);
        $this->assertEquals($to, $mail["Content"]["Headers"]["To"][0]);
        $this->assertEquals($headers, "From: " . $mail["Content"]["Headers"]["From"][0]);

        $this->assertStringContainsString("Hello from PHPUnit test!", $mail["Content"]["Body"]);
    }
}