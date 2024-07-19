<?php
session_start();

// Vérifier si l'utilisateur est connecté et a le rôle d'employé
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'employe') {
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

// Récupération des avis non validés
$sql_avis = "SELECT avis_id, pseudo, commentaire FROM avis WHERE isVisible = 0";
$result_avis = $conn->query($sql_avis);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Espace Employé - Zoo</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- Ajout de la nav bar -->
    <?php include('html/nav.html'); ?>

    <div class="container mt-5">
        <h1>Espace Employé</h1>
        
        <!-- Validation des avis -->
        <h2>Validation des Avis</h2>
        <div class="list-group">
        <?php
        if ($result_avis->num_rows > 0) {
            while($row = $result_avis->fetch_assoc()) {
                echo '<div class="list-group-item">';
                echo '<strong>Pseudo:</strong> ' . htmlspecialchars($row["pseudo"]) . '<br>';
                echo '<strong>Avis:</strong> ' . htmlspecialchars($row["commentaire"]) . '<br>';
                echo '<form action="valider_avis.php" method="post" class="d-inline">';
                echo '<input type="hidden" name="avis_id" value="' . $row["avis_id"] . '">';
                echo '<button type="submit" name="action" value="valider" class="btn btn-success btn-sm">Valider</button>';
                echo '</form> ';
                echo '<form action="valider_avis.php" method="post" class="d-inline">';
                echo '<input type="hidden" name="avis_id" value="' . $row["avis_id"] . '">';
                echo '<button type="submit" name="action" value="invalider" class="btn btn-danger btn-sm">Invalider</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo "<p>Aucun avis à valider.</p>";
        }
        ?>
        </div>

        <!-- Modification des services -->
        <h2>Modification des Services</h2>
        <?php
        // Récupération des services
        $sql_services = "SELECT service_id, nom, description FROM service";
        $result_services = $conn->query($sql_services);

        if ($result_services->num_rows > 0) {
            echo '<ul class="list-group">';
            while($row = $result_services->fetch_assoc()) {
                echo '<li class="list-group-item">';
                echo '<strong>Nom:</strong> ' . htmlspecialchars($row["nom"]) . '<br>';
                echo '<strong>Description:</strong> ' . htmlspecialchars($row["description"]) . '<br>';
                echo '<a href="modifier_service.php?id=' . $row["service_id"] . '" class="btn btn-primary btn-sm">Modifier</a>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo "<p>Aucun service à modifier.</p>";
        }
        ?>

        <!-- Alimentation des animaux -->
        <h2>Alimentation des Animaux</h2>
        <form action="ajouter_alimentation.php" method="post">
            <div class="form-group">
                <label for="animal_id">Sélectionner un animal</label>
                <select class="form-control" id="animal_id" name="animal_id" required>
                    <?php
                    // Récupérer les informations des animaux
                    $sql_animaux = "SELECT animal_id, prenom FROM animal";
                    $result_animaux = $conn->query($sql_animaux);

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
                <label for="heure">Heure</label>
                <input type="time" class="form-control" id="heure" name="heure" required>
            </div>
            <div class="form-group">
                <label for="nourriture">Nourriture</label>
                <input type="text" class="form-control" id="nourriture" name="nourriture" required>
            </div>
            <div class="form-group">
                <label for="quantite">Quantité (en grammes)</label>
                <input type="number" class="form-control" id="quantite" name="quantite" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
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