<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Avis - Zoo</title>
    <!-- Bootstrap CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Ajout de la nav bar -->
    <?php include('html/nav.html'); ?>

    <div class="container mt-5">
        <h1 class="text-center">Avis des Visiteurs</h1>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zoo";

        // Connexion à la base de données
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérification de la connexion
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Récupératio  des avis validés
        $sql = "SELECT pseudo, commentaire, date FROM avis WHERE isVisible = 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Afficher chaque avis
            while($row = $result->fetch_assoc()) {
                echo '<div class="card mt-3">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($row["pseudo"]) . '</h5>';
                echo '<h6 class="card-subtitle mb-2 text-muted">' . htmlspecialchars($row["date"]) . '</h6>';
                echo '<p class="card-text">' . htmlspecialchars($row["commentaire"]) . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>Aucun avis pour le moment.</p>";
        }

        // Fermer la connexion
        $conn->close();
        ?>
    </div>

    <!-- Inclusion du footer -->
    <?php include('html/footer.html'); ?>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>