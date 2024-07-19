<?php
session_start();

// Vérifie si l'utilisateur est connecté et a le rôle de vétérinaire
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'veto') {
    header("Location: ../login.php");
    exit();
}

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
$animal_id = $_POST['animal_id'];
$date = $_POST['date'];
$etat = $_POST['etat'];
$detail = $_POST['detail'];

// Insértion du rapport vétérinaire dans la base de données
$sql = "INSERT INTO rapport_veterinaire (animal_id, date, detail) VALUES ($animal_id, '$date', 'État: $etat. Détail: $detail')";

if ($conn->query($sql) === TRUE) {
    echo "Rapport vétérinaire ajouté avec succès.";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>