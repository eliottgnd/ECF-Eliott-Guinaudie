<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Accueil - Zoo</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- Feuille de style propre au index.php -->
    <style>
        .hero {
            background-image: url('assets/images/zoo-background.jpg');
            background-size: cover;
            background-position: center;
            color: rgba(0, 0, 0, 0.7);
            text-align: center;
            padding: 100px 0;
        }
        .hero img {
            max-height: 300px;
            object-fit: cover;
        }
        .hero h1 {
            font-size: 4rem;
            margin-bottom: 20px;
        }
        .hero p {
            font-size: 1.5rem;
        }
        .hero .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
        .card-body {
            text-align: center;
            padding: 20px;
        }
        .card-text i {
            font-size: 3rem;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 1.2rem;
        }
        .carousel-item img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
        .weather-image {
            max-height: 200px; 
            object-fit: cover;
}
    </style>
</head>
<body>

    <!-- Ajout de la nav bar -->
    <?php include('html/nav.html'); ?>

    <!-- Hero section -->
    <div class="hero">
        <div class="container">
            <h1>Bienvenue au Zoo!</h1>
            <p>Découvrez une variété incroyable d'animaux du monde entier.</p>
        </div>
    </div>

    <!-- Section Slideshow -->
    <div class="container my-5">
        <h2 class="text-center">Vivez la magie du zoo d'Arcadia</h2>
        <div id="zooCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <!-- Habitats Slide -->
                <div class="carousel-item active">
                    <img src="assets/images/habitats.jpg" class="d-block w-100" alt="Habitats">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Nos Habitats</h5>
                        <p>Découvrez les différents habitats créés pour nos animaux.</p>
                    </div>
                </div>
                <!-- Services Slide -->
                <div class="carousel-item">
                    <img src="assets/images/services.jpg" class="d-block w-100" alt="Services">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Nos Services</h5>
                        <p>Profitez de nos services pour une visite agréable.</p>
                    </div>
                </div>
                <!-- Animaux Slide -->
                <div class="carousel-item">
                    <img src="assets/images/animaux.jpg" class="d-block w-100" alt="Animaux">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Nos Animaux</h5>
                        <p>Rencontrez les animaux extraordinaires du zoo.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#zooCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="carousel-control-next" href="#zooCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>
    </div>

    <!-- Section sur les actions écologiques du zoo --> <!-- À finir -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="assets/images/eco-actions.jpg" class="img-fluid" alt="Actions écologiques du zoo">
            </div>
            <div class="col-md-6">
                <h3>Nos engagements écologiques</h3>
                <p>Au Zoo Arcadia, nous sommes fermement engagés dans la protection de l'environnement et la préservation de la biodiversité.</p>
                <p>Nous avons mis en place plusieurs initiatives écologiques pour minimiser notre empreinte carbone et promouvoir la durabilité. Nos actions incluent la réduction des déchets plastiques, l'utilisation d'énergies renouvelables, et la participation à des programmes de conservation des espèces menacées.</p>
                <p>Nous croyons qu'en éduquant nos visiteurs sur l'importance de la conservation, nous pouvons inspirer des actions positives pour l'environnement.</p>
                <a href="page_engagement_eco.php" class="btn btn-outline-success">En savoir plus</a>
            </div>
        </div>
    </div>

    <!-- Section des avis -->
        <div class="container mt-5">
        <h2>Avis des visiteurs</h2>
        <div class="row">
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

            // Récupération des avis validés
            $sql = "SELECT pseudo, commentaire FROM avis WHERE isVisible = 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Afficher chaque avis
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card mt-3">';
                    echo '<div class="card-body">';
                    echo '<div class="d-flex align-items-center">';
                    echo '<i class="fas fa-user-circle fa-2x mr-2"></i>'; // Icône de l'utilisateur
                    echo '<h5 class="card-title mb-0">' . htmlspecialchars($row["pseudo"]) . '</h5>';
                    echo '</div>';
                    echo '<p class="card-text mt-2">' . htmlspecialchars($row["commentaire"]) . '</p>';
                    echo '</div>';
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
    </div>
</div>
    
   <!-- Section Météo -->
    <div class="container my-5">
        <h2 class="text-center">Météo au Zoo Aujourd'hui</h2>
        <div class="d-flex justify-content-center align-items-center">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Météo actuelle</h5>
                    <p class="card-text">
                        <i id="weather-icon" class=""></i><br>
                        <strong>Température:</strong> <span id="temperature"></span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Connexion Abandonné
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Connexion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="adminNumber">Numéro Admin</label>
                            <input type="text" class="form-control" id="adminNumber" name="adminNumber" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Formulaire pour soumettre un avis -->
    <div class="container mt-5">
        <h2>Laissez un avis</h2>
        <form action="submit_review.php" method="post">
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" required>
            </div>
            <div class="form-group">
                <label for="avis">Votre avis</label>
                <textarea class="form-control" id="avis" name="avis" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>

<!-- Ajout de la nav bar -->
    <?php include('html/footer.html'); ?>

<!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Lien vers le fichier JavaScript pour l'API météo Bonus-->
    <script src="scripts/api.js"></script>
</body>
</html> 