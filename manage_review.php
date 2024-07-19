<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "Eliott64*"; 
$dbname = "zoo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
$avis_id = $_POST['avis_id'];
$action = $_POST['action'];

if ($action == 'valider') {
    // Validation d'un avis
    $sql = "UPDATE avis SET isVisible = 1 WHERE avis_id = $avis_id";
} else if ($action == 'supprimer') {
    // Suppression d'un avis
    $sql = "DELETE FROM avis WHERE avis_id = $avis_id";
}

if ($conn->query($sql) === TRUE) {
    echo "L'action a été effectuée avec succès.";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Rediriger vers la page d'administration des avis
header('Location: avis_admin.php');
exit;
?>