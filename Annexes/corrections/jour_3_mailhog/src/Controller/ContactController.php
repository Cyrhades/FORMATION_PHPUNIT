<?php declare(strict_types=1);

namespace App\Controller;

use App\Service\Mailing;

final class ContactController extends AbstractController {

    public function form() {
        $this->render('contact_form');
    }

    public function processing() 
    {
        $nom = $this->getBody('nom');
        $prenom = $this->getBody('prenom');
        $email =$this->getBody('email');
        $message = $this->getBody('message') ?? 'aucun message';
        

        (new Mailing)->sendMail(
            $email, 
            'Contact via le site', 
            "Nom: $nom\nPrénom: $prenom\nEmail: $email\n\nMessage:\n$message"
        );
        
        $this->redirect('/');
    }
}