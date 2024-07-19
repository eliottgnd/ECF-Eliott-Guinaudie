<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administration des Avis - Zoo</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Ajout du fichier de la nav bar -->
    <?php include('html/nav.html'); ?>

    <div class="container mt-5">
        <h1 class="text-center">Administration des Avis</h1>

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

        // Récupération des avis non validés
        $sql = "SELECT avis_id, pseudo, commentaire FROM avis WHERE isVisible = 0";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Afficher chaque avis avec des boutons pour valider ou supprimer
            while($row = $result->fetch_assoc()) {
                echo '<div class="card mt-3">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($row["pseudo"]) . '</h5>';
                echo '<p class="card-text">' . htmlspecialchars($row["commentaire"]) . '</p>';
                echo '<form action="manage_review.php" method="post">';
                echo '<input type="hidden" name="avis_id" value="' . $row["avis_id"] . '">';
                echo '<button type="submit" name="action" value="valider" class="btn btn-success">Valider</button> ';
                echo '<button type="submit" name="action" value="supprimer" class="btn btn-danger">Supprimer</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>Aucun avis en attente de validation.</p>";
        }

        // Fermer la connexion
        $conn->close();
        ?>
    </div>

    <!-- Ajout du footer -->
    <?php include('html/footer.html'); ?>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>