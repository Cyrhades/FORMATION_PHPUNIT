<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Service\Mailing;

class ContactEmailTest extends TestCase
{
    private const MAILHOG_API = 'http://localhost:8025/api/v2/messages?limit=1';

    protected function setUp(): void
    {
        file_get_contents('http://localhost:8025/api/v1/messages');
    }

    public function testEmailIsReceivedInMailHog()
    {
        $nom = 'Doe';
        $prenom = 'John';
        $email = 'j.doe@example.com';
        $message = 'test message';

        (new Mailing)->sendMail(
            $email, 
            'Contact via le site', 
            "Nom: $nom\nPrénom: $prenom\nEmail: $email\n\nMessage:\n$message"
        );
 
        $json = file_get_contents(self::MAILHOG_API);
        $messages = json_decode($json, true);
        
        $this->assertNotEmpty($messages['items'], "Aucun email reçu dans MailHog !");
        $mail = $messages['items'][0];
        $this->assertEquals('Contact via le site', $mail['Content']['Headers']['Subject'][0]);
        $body = $mail['Content']['Body'];
        $this->assertStringContainsString('Nom: Doe', $body);
        $this->assertStringContainsString('Prénom: John', $body);
    }
}
