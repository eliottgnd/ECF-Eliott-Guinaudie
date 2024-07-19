
# Zoo d'Arcadia Eliott GUINAUDIE --README

Bienvenue dans le dépôt de l’application de gestion du Zoo d’Arcadia. Ce document vous guidera à travers les étapes nécessaires pour déployer l’application en local.


## Prérequis
	•	PHP 7.x ou supérieur
	•	MySQL 5.x ou supérieur
	•	Serveur Web (Apache, Nginx, etc.)
## Déploiement

1. Clonez le dépot dans votre machine locale
  
```bash
  git clone https://github.com/eliottgnd/ECF-Eliott-Guinaudie.git
cd ECF-Eliott-Guinaudie
```

2. Créez et configurez la base de donnée MySQL
Ouvrez MySQL Workbench ou similaire
  
```code
CREATE DATABASE zoo;

USE zoo;

CREATE TABLE utilisateur (
    username VARCHAR(50) PRIMARY KEY,
    password VARCHAR(50),
    nom VARCHAR(50),
    prenom VARCHAR(50)
);

CREATE TABLE role (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50)
);

CREATE TABLE animal (
    animal_id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(50),
    race VARCHAR(50),
    etat VARCHAR(50),
    image VARCHAR(100)
);

CREATE TABLE habitat (
    habitat_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    description VARCHAR(255),
    commentaire_habitat VARCHAR(255)
);

CREATE TABLE avis (
    avis_id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50),
    commentaire VARCHAR(255),
    isVisible BOOL
);

CREATE TABLE rapport_veterinaire (
    rapport_veterinaire_id INT AUTO_INCREMENT PRIMARY KEY,
    animal_id INT,
    date DATE,
    detail VARCHAR(255),
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id)
);

CREATE TABLE service (
    service_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    description VARCHAR(255)
);

CREATE TABLE image (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    image_data BLOB
);

INSERT INTO role (label) VALUES ('Admin'), ('Employé'), ('Vétérinaire'), ('Visiteur');
INSERT INTO utilisateur (username, password, nom, prenom) VALUES ('admin1', 'admin1', 'Admin', 'One');

INSERT INTO animal (prenom, race, etat, image) VALUES ('Coco', 'Ara macao', 'Bon état', 'assets/images/coco.jpg');
INSERT INTO animal (prenom, race, etat, image) VALUES ('Hippo', 'Hippopotame', 'Excellent état', 'assets/images/hippo.jpg');

INSERT INTO habitat (nom, description, commentaire_habitat) VALUES ('Aviary Tropical', 'Description de l\'habitat des oiseaux tropicaux.', '');
INSERT INTO habitat (nom, description, commentaire_habitat) VALUES ('Étang des Hippopotames', 'L\'Étang des Hippopotames recrée un environnement aquatique...', '');

INSERT INTO avis (pseudo, commentaire, isVisible) VALUES ('Visiteur1', 'Très beau parc!', 0);

INSERT INTO rapport_veterinaire (animal_id, date, detail) VALUES (1, '2024-07-01', 'Bon état général.');
INSERT INTO rapport_veterinaire (animal_id, date, detail) VALUES (2, '2024-07-05', 'Excellent état.');

INSERT INTO service (nom, description) VALUES ('Visite guidée', 'Profitez de nos visites guidées pour découvrir le parc.');
INSERT INTO service (nom, description) VALUES ('Restauration', 'Des restaurants sont disponibles à l\'intérieur du parc.');

```

3. Créez un fichier .env à la racine de votre projet et ajoutez les informations de configuration de la base de donnée

```code
DB_HOST=localhost
DB_USER=root
DB_PASSWORD=yourpassword
DB_NAME=zoo
```

4. Dans un terminal de commande assurez vous que PHP et votre serveur web sont installés et configurés 

```bash
php -S localhost:8000
```

5. Accès à l'application

Ouvrez votre navigateur et accédez à [Votre Projet](http://localhost:8000) (ou http://localhost:8000)


## Sources & Inspirations

 - [Comment rédiger son README](https://youtu.be/ukxhz9WUF4Q?si=7t3NRKyqvHAWPi7S)
 - [Installer sa Base de donnée MySQL pour les débutants](https://youtu.be/wgRwITQHszU?si=0vmCZZ5-fB30cRuu)
 - [BootStrap et Documentation](https://getbootstrap.com/)
 - [Inspirations Graphiques](https://www.youtube.com/@juxtopposed/videos)
 - [Inspirations Graphiques 2](https://getbootstrap.com/docs/5.3/examples/)
 - [Images](https://www.freepik.com/)
 - [Inspirations de Développement](hhttps://www.youtube.com/@WebDevForYou)
 - [Bootstrap Javascript](https://getbootstrap.com/docs/3.4/javascript/)
 - [FontAwesome](https://fontawesome.com/)
 - [Doc & Cours MDN WebDocs](https://developer.mozilla.org/en-US/)
 - [Cours & Leçons](https://app.studi.fr/v3/dashboard)

 


