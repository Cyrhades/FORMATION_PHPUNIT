# Tests fonctionnels BDD

L'objectif est de valider une chaîne fonctionnelle complète, par exemple le processus d'inscription d'un utilisateur.

Cela inclut la vérification de l'ensemble des étapes métier : contrôle des données saisies (email, mot de passe), confirmation que l'utilisateur n'existe pas déjà en base, puis enregistrement de l'utilisateur.

Nous allons ainsi mettre en place un test fonctionnel **complexe** pour valider tout le système d'inscription, y compris l'envoi d'un email de confirmation. Pour cela, nous utiliserons MailHog afin de vérifier la bonne réception du mail.

```yml
version: "3.9"

services:
  mailhog:
    image: mailhog/mailhog:v1.0.1
    container_name: mailhog
    ports:
      - "1025:1025"
      - "8025:8025"
    restart: unless-stopped
``` 
> docker-compose up -d


Dans cet exercice, vous devez mettre en place le formulaire d'inscription ainsi que l’envoi de l’email de confirmation (en environnement de développement via MailHog).
Vous devrez également charger vos variables de configuration à partir d’un fichier .env spécifique au développement.

Vous devrez ensuite créer un test unitaire permettant de valider le fonctionnement du formulaire d’inscription ainsi que l’envoi de l’email associé.
