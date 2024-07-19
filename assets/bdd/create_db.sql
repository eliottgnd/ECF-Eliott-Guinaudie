CREATE DATABASE zoo;
USE zoo;

-- Table utilisateur
CREATE TABLE utilisateur (
    username VARCHAR(50) PRIMARY KEY,
    password VARCHAR(50) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL
);

-- Table role
CREATE TABLE role (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50) NOT NULL
);

-- Table habitat
CREATE TABLE habitat (
    habitat_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    description VARCHAR(50),
    commentaire_habitat TEXT
);

-- Table animal
CREATE TABLE animal (
    animal_id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(50) NOT NULL,
    etat VARCHAR(50)
);

-- Table rapport_veterinaire
CREATE TABLE rapport_veterinaire (
    rapport_veterinaire_id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    detail VARCHAR(50)
);

-- Table race
CREATE TABLE race (
    race_id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50) NOT NULL
);

-- Table image
CREATE TABLE image (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    image_data BLOB NOT NULL
);

-- Table avis
CREATE TABLE avis (
    avis_id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    commentaire VARCHAR(50) NOT NULL,
    isVisible BOOLEAN NOT NULL
);

-- Table service
CREATE TABLE service (
    service_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    description VARCHAR(50)
);