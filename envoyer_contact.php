<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "Eliott64*";
$dbname = "zoo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
$titre = $_POST['titre'];
$description = $_POST['description'];
$email = $_POST['email'];

// Insértion des données dans la base de données
$sql = "INSERT INTO contact (titre, description, email) VALUES ('$titre', '$description', '$email')";

// Ici on simule étant donné qu'Arcadia n'a pas d'adresse mail
if ($conn->query($sql) === TRUE) {
    // Configuration de l'email
    $to = "contact.arcadia@zoo.com";  
    $subject = "Nouvelle demande de contact: " . $titre;
    $message = "Vous avez reçu une nouvelle demande de contact.\n\n" . "Titre: " . $titre . "\n\nDescription: " . $description . "\n\nEmail: " . $email;
    $headers = "From: " . $email;

    // Envoi de l'email
    if (mail($to, $subject, $message, $headers)) {
        echo "Votre demande a été envoyée avec succès.";
    } else {
        echo "Erreur lors de l'envoi de votre demande. Veuillez réessayer plus tard.";
    }
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion
$conn->close();
?>