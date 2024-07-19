<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Animaux - Zoo</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .card-img-top {
            max-height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- Ajout du fichier de la nav bar -->
    <?php include('../html/nav.html'); ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Nos Animaux</h1>
        <div class="row">
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

            // Récupération des animaux de la table animal
            $sql = "SELECT animal_id, prenom, race, image, etat FROM animal";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Affiche chaque animal
                while($row = $result->fetch_assoc()) {
                    $prenom = htmlspecialchars($row["prenom"] ?? 'Nom inconnu');
                    $race = htmlspecialchars($row["race"] ?? 'Race inconnue');
                    $etat = htmlspecialchars($row["etat"] ?? 'État inconnu');
                    $image = htmlspecialchars($row["image"] ?? 'nomanimal1.jpg');
                    // Enlève le 1 avant .jpg si présent
                    $image = str_replace('1.jpg', '.jpg', $image);

                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card h-100">';
                    echo '<img src="../assets/images/' . $image . '" class="card-img-top" alt="' . $prenom . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $prenom . '</h5>';
                    echo '<p class="card-text">Race: ' . $race . '</p>';
                    echo '<p class="card-text">État: ' . $etat . '</p>';
                    echo '<a href="animal_detail.php?id=' . $row["animal_id"] . '" class="btn btn-primary">Voir plus</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Aucun animal trouvé.</p>";
            }

            // Fermer la connexion
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Ajout du footer -->
    <?php include('../html/footer.html'); ?>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>