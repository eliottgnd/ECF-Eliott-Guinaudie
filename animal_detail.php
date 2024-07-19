<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Détail de l'Animal - Zoo</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .card-img-top {
            max-height: 600px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- Ajout du fichier de la nav bar -->
    <?php include('html/nav.html'); ?>

    <div class="container mt-5">
        <?php
        // Informations de connexion à la base de données
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

        // Récupération des détails de l'animal
        $animal_id = $_GET['id'];
        $sql = "SELECT prenom, race, image, etat FROM animal WHERE animal_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $animal_id);
        $stmt->execute();
        $stmt->bind_result($prenom, $race, $image, $etat);
        $stmt->fetch();
        $stmt->close();

        if ($prenom) {
            // Enlève le 1 avant .jpg si présent
            $image = str_replace('1.jpg', '.jpg', $image);

            echo '<div class="card">';
            echo '<img src="../assets/images/' . htmlspecialchars($image) . '" class="card-img-top" alt="' . htmlspecialchars($prenom) . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($prenom) . '</h5>';
            echo '<p class="card-text">Race: ' . htmlspecialchars($race) . '</p>';
            echo '<p class="card-text">État: ' . htmlspecialchars($etat) . '</p>';

            // Récupération des rapports vétérinaires
            $sql_vet = "SELECT date, detail FROM rapport_veterinaire WHERE animal_id = ?";
            $stmt_vet = $conn->prepare($sql_vet);
            $stmt_vet->bind_param("i", $animal_id);
            $stmt_vet->execute();
            $stmt_vet->store_result(); // Stocke le résultat
            $stmt_vet->bind_result($date, $detail);

            if ($stmt_vet->num_rows > 0) { // Vérifie si des rapports existent
                echo '<h5 class="mt-4">Rapports Vétérinaires</h5>';
                echo '<ul class="list-group">';
                while ($stmt_vet->fetch()) {
                    echo '<li class="list-group-item">';
                    echo '<strong>Date:</strong> ' . htmlspecialchars($date) . '<br>';
                    if (!empty($detail)) {
                        echo '<strong>Détail:</strong> ' . htmlspecialchars($detail) . '<br>';
                    }
                    echo '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>Aucun rapport vétérinaire trouvé.</p>';
            }
            $stmt_vet->close();

            echo '<a href="animal.php" class="btn btn-secondary mt-4">Retour à la liste</a>';
            echo '</div>';
            echo '</div>';
        } else {
            echo "<p>Aucun détail trouvé pour cet animal.</p>";
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