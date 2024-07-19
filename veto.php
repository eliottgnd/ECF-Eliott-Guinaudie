<?php
session_start();

// Vérifier si l'utilisateur est connecté et a le rôle de vétérinaire
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

// Renvoie une erreur si la connexion échoue
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupére les animaux
$sql_animaux = "SELECT animal_id, prenom FROM animal";
$result_animaux = $conn->query($sql_animaux);

// Récupére les habitats
$sql_habitats = "SELECT habitat_id, nom FROM habitat";
$result_habitats = $conn->query($sql_habitats);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Espace Vétérinaire - Zoo</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- Ajout de la nav bar -->
    <?php include('html/nav.html'); ?>

    <div class="container mt-5">
        <h1>Espace Vétérinaire</h1>

        <!-- Remplir les comptes rendus par animal -->
        <h2>Comptes Rendus des Animaux</h2>
        <form action="ajouter_compte_rendu.php" method="post">
            <div class="form-group">
                <label for="animal_id">Sélectionner un animal</label>
                <select class="form-control" id="animal_id" name="animal_id" required>
                    <?php
                    if ($result_animaux->num_rows > 0) {
                        while($row = $result_animaux->fetch_assoc()) {
                            echo '<option value="' . $row["animal_id"] . '">' . htmlspecialchars($row["prenom"]) . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="etat">État de l'animal</label>
                <input type="text" class="form-control" id="etat" name="etat" required>
            </div>
            <div class="form-group">
                <label for="detail">Détail de l'état (facultatif)</label>
                <textarea class="form-control" id="detail" name="detail" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        <!-- Permet au véto de commenter sur les habitats -->
        <h2>Commentaires sur les Habitats</h2>
        <form action="ajouter_commentaire_habitat.php" method="post">
            <div class="form-group">
                <label for="habitat_id">Sélectionner un habitat</label>
                <select class="form-control" id="habitat_id" name="habitat_id" required>
                    <?php
                    if ($result_habitats->num_rows > 0) {
                        while($row = $result_habitats->fetch_assoc()) {
                            echo '<option value="' . $row["habitat_id"] . '">' . htmlspecialchars($row["nom"]) . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="commentaire">Commentaire</label>
                <textarea class="form-control" id="commentaire" name="commentaire" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

        <!-- Voir la nourriture consommée par les animaux -->
        <h2>Nourriture Consommée par les Animaux</h2>
        <div class="list-group">
        <?php
        if ($result_animaux->num_rows > 0) {
            while($row = $result_animaux->fetch_assoc()) {
                echo '<div class="list-group-item">';
                echo '<h5>' . htmlspecialchars($row["prenom"]) . '</h5>';
                $sql_nourriture = "SELECT date, detail FROM rapport_veterinaire WHERE animal_id = " . $row["animal_id"];
                $result_nourriture = $conn->query($sql_nourriture);

                if ($result_nourriture->num_rows > 0) {
                    while($nourriture = $result_nourriture->fetch_assoc()) {
                        echo '<p><strong>Date:</strong> ' . htmlspecialchars($nourriture["date"]) . '<br>';
                        echo '<strong>Détail:</strong> ' . htmlspecialchars($nourriture["detail"]) . '</p>';
                    }
                } else {
                    echo "<p>Aucune donnée disponible.</p>";
                }
                echo '</div>';
            }
        }
        ?>
        </div>
    </div>

    <!-- Ajout du footer -->
    <?php include('html/footer.html'); ?>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>