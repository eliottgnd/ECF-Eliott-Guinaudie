<?php

$servername = "localhost";
$username = "root";
$password = "Eliott64*"; 
$dbname = "zoo";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire et supprime les caractères spéciaux
$pseudo = mysqli_real_escape_string($conn, $_POST['pseudo']);
$avis = mysqli_real_escape_string($conn, $_POST['avis']);

// Insértion de l'avis dans la base de données
$sql = "INSERT INTO avis (pseudo, commentaire, isVisible) VALUES ('$pseudo', '$avis', 0)";

if ($conn->query($sql) === TRUE) {
    echo "Votre avis a été soumis pour validation.";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>