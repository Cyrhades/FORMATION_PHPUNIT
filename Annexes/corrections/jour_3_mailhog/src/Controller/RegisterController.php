<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;

use App\Service\Mailing;


final class RegisterController extends AbstractController {

    public function form() {
        $this->render('register_form');
    }

    public function processing() 
    {
        $nom = $this->getBody('nom');
        $prenom = $this->getBody('prenom');
        $email =$this->getBody('email');
        $password = $this->getBody('password');
        
        // Vérification minimale
        if ($nom === '' || $prenom === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8) {
            $this->render('register_form', [
                'nom'       => $nom,
                'prenom'    => $prenom,
                'email'     => $email,
                'error'     => 'Remplissez correctement le formulaire'
            ]);
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $user = new User(null, $nom, $prenom, $email, $password);
            $repo = new UserRepository();

            if ($repo->findByEmail($email)) {
                $this->render('register_form', [
                    'nom'       => $nom,
                    'prenom'    => $prenom,
                    'email'     => $email,
                    'error'     => 'Un compte existe déjà avec cet email.'
                ]);
            }
            else {
                $repo->save($user);
                // Envoi  du mail de confirmation
                (new Mailing)->sendMail(
                    $email, 
                    'Inscription', 
                    "Bonjour $prenom\n\nBienvenue sur notre site !"
                );
                $this->getFlash()->success('Merci pour votre inscription');
                $this->redirect("/");
            }
        }
    }
}