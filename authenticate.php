<?php
session_start();

// Connexion à la base de donnée
$servername = "localhost";
$username = "root";
$password = "Eliott64*"; 
$dbname = "zoo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username, password, role FROM utilisateur WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == 'admin') {
            header("Location: ../admin.php");
        } elseif ($row['role'] == 'employe') {
            header("Location: ../employee.php");
        } elseif ($row['role'] == 'veto') {
            header("Location: ../veto.php");
        } else {
            echo "Rôle utilisateur non reconnu.";
        }
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}

$conn->close();
?>